<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\AppointmentFee;
use App\Models\Payment;


class AppointmentController extends Controller
{
    /**
     * Display the current appointment record along with the patient's appointment history.
     */
    public function viewRecord($id)
    {
        $appointment = Appointments::with(['user', 'service', 'dentist', 'additional_fee'])->findOrFail($id);

        // Fetch past appointments (archived appointments) for the patient, most recent first
        $appointmentHistory = Appointments::with(['dentist', 'service', 'additional_fee'])
            ->where('user_id', $appointment->user_id)
            ->where('status', 'Done')
            ->orderBy('appointment_time', 'desc')
            ->get();

        // Assuming $schedules and $dentist are available; adjust as needed.
        $schedules = [];
        $dentist = $appointment->dentist;

        return view('record', compact('appointment', 'appointmentHistory', 'schedules', 'dentist'));
    }

    /**
     * Save procedure notes and additional fee (if provided).  
     * For appointments marked as 'Done', update fee data and archive the appointment.
     */
    public function saveRecord(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);

        $validatedData = $request->validate([
            'procedure_notes'       => 'nullable|string',
            'service_discount'      => 'nullable|numeric|min:0|max:100',
            'fee_type'              => 'nullable|array',
            'fee_type.*'            => 'nullable|string',
            'fee_amount'            => 'nullable|array',
            'fee_amount.*'          => 'nullable|numeric',
            'discount_percentage'   => 'nullable|array',
            'discount_percentage.*' => 'nullable|numeric|min:0|max:100',
        ]);

        // Update procedure notes
        $appointment->procedure_notes = $validatedData['procedure_notes'] ?? $appointment->procedure_notes;

        // --- SERVICE DISCOUNT LOGIC ---
        $originalPrice = $appointment->service->price_start;

        if (isset($validatedData['service_discount'])) {
            $discountPercentage = $validatedData['service_discount'];

            // Remove any existing service discount record for this appointment.
            AppointmentFee::where('appointments_id', $appointment->id)
                ->whereNotNull('service_name')
                ->delete();

            // Create a new record for the service discount.
            AppointmentFee::create([
                'appointments_id'    => $appointment->id,
                'service_name'       => $appointment->service->name,
                'service_amount'     => $originalPrice,
                'service_discount'   => $discountPercentage,
                'fee_type'           => '',
                'fee_amount'         => 0,
                'discount_percentage' => 0,
            ]);
        } else {
            // If no discount is provided, store the original price without applying any discount.
            AppointmentFee::create([
                'appointments_id'    => $appointment->id,
                'service_name'       => $appointment->service->name,
                'service_amount'     => $originalPrice,
                'service_discount'   => 0,  // No discount
                'fee_type'           => '',
                'fee_amount'         => 0,
                'discount_percentage' => 0,
            ]);
        }

        // --- ADDITIONAL FEES LOGIC ---
        if ($appointment->status === 'Done' && !empty($validatedData['fee_type']) && !empty($validatedData['fee_amount'])) {
            // Remove existing fee records (those that do not have service data).
            AppointmentFee::where('appointments_id', $appointment->id)
                ->whereNull('service_name')
                ->delete();

            // Loop through each fee provided.
            foreach ($validatedData['fee_type'] as $index => $feeType) {
                if (!empty($feeType) && isset($validatedData['fee_amount'][$index])) {
                    AppointmentFee::create([
                        'appointments_id'    => $appointment->id,
                        'service_name'       => null,  // No service name for additional fees
                        'service_amount'     => null,
                        'service_discount'   => 0,
                        'fee_type'           => $feeType,
                        'fee_amount'         => $validatedData['fee_amount'][$index],
                        'discount_percentage' => isset($validatedData['discount_percentage'][$index])
                            ? $validatedData['discount_percentage'][$index]
                            : 0,
                    ]);
                }
            }
        }

        $appointment->save();

        return redirect()->back()->with('success', 'Record saved successfully.');


    }



    public function getAppointmentsWithFees()
    {
        $appointments = Appointments::with(['user', 'fees', 'payments'])->get();
        return view('appointments.index', compact('appointments'));
    }

    public function storePayment(Request $request, $appointmentId)
    {
        $appointment = Appointments::findOrFail($appointmentId);

        $totalFee = $appointment->fees()->sum('fee_amount');
        $totalPaid = $appointment->payments()->sum('amount_paid');

        $newPayment = new Payment([
            'appointment_id' => $appointmentId,
            'amount_paid' => $request->amount_paid,
            'payment_type' => $request->payment_type,
            'remaining_balance' => $totalFee - ($totalPaid + $request->amount_paid),
        ]);

        $newPayment->save();

        return redirect()->back()->with('success', 'Payment recorded successfully!');
    }
}

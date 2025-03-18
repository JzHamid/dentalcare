<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Assign;
use App\Models\Available;
use App\Models\Listing;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentRescheduledMail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class PageController extends Controller
{
    public function index()
    {
        $services = Service::all();

        if (Auth::check()) {
            return view('landing')->with(['logged' => true, 'services' => $services]);
        } else {
            return view('landing')->with(['services' => $services]);
        }
    }

    public function user()
    {
        $user = Auth::user();
        $appointments = Appointments::where([
            ['user_id', '=', $user->id],
        ])->get();

        if ($user->status == 0) {
            return view('user')->with(['logged' => true, 'user' => $user, 'appointments' => $appointments]);
        } else {
            return view('admin');
        }
    }

    private function getServicesForDentist($dentistId)
    {
        // Step 1: Get the clinic IDs where the dentist is available.
        // Assuming the available_dentist table has columns: id, clinic_id, user_id.
        $clinicIds = DB::table('available_dentist')
            ->where('user_id', $dentistId)
            ->pluck('clinic_id')
            ->toArray();

        // Step 2: From those clinics, get the service IDs available.
        // The Available model corresponds to the service_available table.
        $serviceIds = Available::whereIn('listing_id', $clinicIds)
            ->pluck('service_id')
            ->unique()   // in case a service is available at more than one clinic.
            ->toArray();

        // Step 3: Retrieve and return the corresponding Service models.
        return Service::whereIn('id', $serviceIds)->get();
    }

    public function admin()
    {

        // Check if the user is not logged in or has a restricted status (0, 1, 2)
        if (!Auth::check() || in_array(Auth::user()->status, [0, 3])) {
            return redirect('/login');
        }

        $log = Auth::user();
        $user = Auth::user();

        // Fetch services for the logged-in dentist
        $services = $this->getServicesForDentist($log->id);

        $assign = Assign::where('user_id', $log->id)->get();

        // Initialize appointments collection
        $appointments = collect();

        // Check if the logged-in user is a **dentist or a secretary**
        if ($log->status == 2) { // Dentist
            $appointments = Appointments::where('dentist_id', $log->id)->get();
        } elseif ($log->status == 1) { // Secretary
            // Fetch the dentist_id associated with the secretary from the available_dentist table
            $dentistId = DB::table('available_dentist')
                ->where('secretary_id', $log->id)
                ->value('user_id');

            if ($dentistId) {
                // Fetch appointments for the corresponding dentist
                $appointments = Appointments::where('dentist_id', $dentistId)->get();
            }
        }

        // Fetch patients for the logged-in dentist or secretary
        if ($log->status == 2) { // Dentist
            $users = User::where('status', 0)
                ->whereHas('appointments', function ($query) use ($log) {
                    $query->where('dentist_id', $log->id);
                })
                ->get();
        } elseif ($log->status == 1) { // Secretary
            // Get the dentist assigned to the secretary
            $dentistId = Assign::where('secretary_id', $log->id)->value('user_id');

            if ($dentistId) {
                $users = User::where('status', 0)
                    ->whereHas('appointments', function ($query) use ($dentistId) {
                        $query->where('dentist_id', $dentistId);
                    })
                    ->get();
            } else {
                $users = collect(); // Empty collection if no assigned dentist
            }
        }

        // Fetch all secretaries (status = 1)
        $secretaries = User::where('status', 1)->get();

        // Fetch collaborators (dentists, secretaries, and co-dentists in the same clinic)
        $collaborators = DB::table('available_dentist')
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'available_dentist.user_id')
                    ->orOn('users.id', '=', 'available_dentist.secretary_id');
            })
            ->where(function ($query) use ($log) {
                $query->where(function ($subQuery) use ($log) {
                    // For dentists: only show their assigned secretaries
                    $subQuery->where('available_dentist.user_id', $log->id)
                        ->whereColumn('users.id', 'available_dentist.secretary_id');
                })
                    ->orWhere(function ($subQuery) use ($log) {
                        // For secretaries: show their assigned dentists
                        $subQuery->where('available_dentist.secretary_id', $log->id)
                            ->whereColumn('users.id', 'available_dentist.user_id');
                    })
                    ->orWhere(function ($subQuery) use ($log) {
                        // For dentists: show other dentists in same clinic
                        $subQuery->whereIn('available_dentist.clinic_id', function ($clinicQuery) use ($log) {
                            $clinicQuery->select('clinic_id')
                                ->from('available_dentist')
                                ->where('user_id', $log->id);
                        })
                            ->whereColumn('users.id', 'available_dentist.user_id')
                            ->where('available_dentist.user_id', '!=', $log->id);
                    });
            })
            ->where('users.id', '!=', $log->id)
            ->select('users.*')
            ->distinct()
            ->get();


        return view('admin', compact('user'))->with([
            'appointments'  => $appointments,
            'services'      => $services,
            'listings'      => $assign,
            'users'         => $users,
            'log'           => $log,
            'is_online'     => $log->is_online,
            'secretaries'   => $secretaries,
            'collaborators' => $collaborators,
        ]);
    }

    public function superadmin()
    {
        // Check if the user is not logged in or has a restricted status (0, 1, 2)
        if (!Auth::check() || in_array(Auth::user()->status, [0, 1, 2])) {
            return redirect('/login');
        }

        $appointments = Appointments::all();
        $dentist = User::where('status', 2)->get();
        $secretary = User::where('status', 1)->get();
        $users = User::where('status', 0)->get();
        $services = Service::all();
        $listings = Listing::all();

        return view('superadmin')->with([
            'dentist' => $dentist,
            'secretary' => $secretary,
            'users' => $users,
            'appointments' => $appointments,
            'services' => $services,
            'listings' => $listings
        ]);
    }

    public function listing()
    {
        $listings = Listing::with('schedules')->get();
        $services = Service::all();

        return view('listing')->with(['services' => $services, 'listings' => $listings]);
    }

    public function shop($id)
    {
        $shop = Listing::find($id);
        $available = Available::where('listing_id', $shop->id)->get();
        $assign = Assign::where('clinic_id', $shop->id)->get();


        return view('shop')->with(['shop' => $shop, 'availables' => $available, 'assigns' => $assign]);
    }

    public function appointment($id)
    {
        $shop = Listing::find($id);
        $user = Auth::user();
        $available = Available::where('listing_id', $shop->id)->get();
        $schedules = Schedule::where('clinic_id', $shop->id)->get();
        $assign = Assign::where('clinic_id', $id)->get();
    
        // Fetch booked appointments, excluding those with 'Cancelled' or 'Deny' status
        $bookedAppointments = Appointments::where('listing_id', $shop->id)
            ->whereNotIn('status', ['Cancelled', 'Deny'])
            ->get();
    
        return view('appointment')->with([
            'shop' => $shop,
            'user' => $user,
            'availables' => $available,
            'schedules' => $schedules,
            'assign' => $assign,
            'bookedAppointments' => $bookedAppointments,
        ]);
    }
    


    public function record($id)
    {

        // Check if the user is not logged in or has a restricted status (0)
        if (!Auth::check() || in_array(Auth::user()->status, [0])) {
            return redirect('/login');
        }

        $appointment = Appointments::with(['user.healthRecords', 'service', 'dentist', 'additional_fee'])
            ->findOrFail($id);
        $schedule = Schedule::where('clinic_id', $appointment->listing_id)->get();
        $dentist = User::where('id', $appointment->dentist_id)->first();

        // Fetch past (archived) appointments for the patient
        $appointmentHistory = Appointments::with(['dentist', 'service', 'additional_fee'])
            ->where('user_id', $appointment->user_id)
            ->where('status', 'Done')
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('record')->with([
            'appointment' => $appointment,
            'dentist' => $dentist,
            'schedules' => $schedule,
            'appointmentHistory' => $appointmentHistory
        ]);
    }

    private function isWithinClinicHours($clinicId, Carbon $appointmentStart, Carbon $appointmentEnd)
    {
        // Get the day of the week (e.g., "Monday")
        $day = $appointmentStart->format('l');

        // Retrieve the schedule for this clinic and day.
        $schedule = Schedule::where('clinic_id', $clinicId)
            ->where('day', $day)
            ->first();

        // If there is no schedule, assume the clinic is closed.
        if (!$schedule) {
            return false;
        }

        // Create Carbon instances from the schedule's start and end times.
        // (These times are assumed to be stored in 'H:i:s' format.)
        $clinicStart = Carbon::createFromFormat('H:i:s', $schedule->start);
        $clinicEnd   = Carbon::createFromFormat('H:i:s', $schedule->end);

        // Extract only the time part of the appointment times.
        $appointmentStartTime = Carbon::createFromFormat('H:i:s', $appointmentStart->format('H:i:s'));
        $appointmentEndTime   = Carbon::createFromFormat('H:i:s', $appointmentEnd->format('H:i:s'));

        // Ensure the appointment does not start before or end after the clinic's hours.
        if ($appointmentStartTime->lt($clinicStart) || $appointmentEndTime->gt($clinicEnd)) {
            return false;
        }

        return true;
    }

    public function reschedule_appointment_admin(Request $request, $id)
    {
        $appointment = Appointments::find($id);
        $clinicId = $appointment->listing_id;
        $dentistId = $appointment->dentist_id;
        $service = Service::find($appointment->service_id);
        $duration = $service->duration;

        $newStart = Carbon::parse($request->schedule);
        $newEnd = $newStart->copy()->addMinutes($duration);

        // --- Business Hours Check ---
        if (!$this->isWithinClinicHours($clinicId, $newStart, $newEnd)) {
            return redirect()->back()->withErrors([
                'msg' => 'The rescheduled time is outside the clinic\'s business hours.'
            ]);
        }

        // --- Overlapping Appointment Check ---
        $overlapping = Appointments::join('services', 'appointments.service_id', '=', 'services.id')
            ->where('appointments.listing_id', $clinicId)
            ->where('appointments.dentist_id', $dentistId)
            ->where('appointments.id', '!=', $id) // Exclude the current appointment being rescheduled
            ->where(function ($query) use ($newStart, $newEnd) {
                $query->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) < ?', [$newEnd->toDateTimeString()])
                    ->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) + INTERVAL services.duration MINUTE > ?', [$newStart->toDateTimeString()]);
            })
            ->exists();

        if ($overlapping) {
            return redirect()->back()->withErrors([
                'msg' => 'The selected time overlaps with an existing appointment. Please choose another time.'
            ]);
        }

        $appointment->rescheduled_time = $request->schedule;
        $appointment->reschedule_reason = $request->reschedule_reason;
        $appointment->status = 'Rescheduled';
        $appointment->save();

        // Get Patient Info
        $patient = User::find($appointment->user_id);

        // Get Dentist Info
        $dentist = User::find($appointment->dentist_id);

        // Get Clinic Info
        $clinic = Listing::find($appointment->listing_id);

        // Get Service Info
        $service = Service::find($appointment->service_id);

        // Get Dentists (Status 2) and Superadmins (Status 3)
        $dentistEmail = $dentist->email;
        $superadmins = User::where('status', 3)->pluck('email')->toArray();

        // Send Email to Dentist
        Mail::to($dentistEmail)->send(new AppointmentRescheduledMail($appointment, $dentist, $clinic, $service, $patient));

        // Send Email to Superadmins
        foreach ($superadmins as $superadminEmail) {
            Mail::to($superadminEmail)->send(new AppointmentRescheduledMail($appointment, $dentist, $clinic, $service, $patient));
        }

        // Send Email to Patient
        if (!empty($patient->email)) {
            Mail::to($patient->email)->send(new AppointmentRescheduledMail($appointment, $dentist, $clinic, $service, $patient));
        }

        return redirect('/user-record/' . $id)->with('success', 'Appointment rescheduled and notifications sent to the patient, dentist, and superadmins.');
    }
}

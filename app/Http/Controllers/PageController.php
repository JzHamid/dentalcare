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
            ['status', '!=', 'Cancelled']
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
        $log = Auth::user();

        // Instead of showing all services, get only those available for the logged-in dentist.
        $services = $this->getServicesForDentist($log->id);

        $assign = Assign::where('user_id', $log->id)->get();
        $appointments = Appointments::where('dentist_id', $log->id)->get();
        $users = User::all();

        return view('admin')->with([
            'appointments' => $appointments,
            'services'     => $services,
            'listings'     => $assign,
            'users'        => $users,
            'log'          => $log,
            'is_online'    => $log->is_online,
        ]);
    }

    public function superadmin()
    {
        $appointments = Appointments::all();
        $dentist = User::where('status', 2)->get();
        $secretary = User::where('status', 1)->get();
        $users = User::where('status', 0)->get();
        $services = Service::all();
        $listings = Listing::all();

        return view('superadmin')->with(['dentist' => $dentist, 'secretary' => $secretary, 'users' => $users, 'appointments' => $appointments, 'services' => $services, 'listings' => $listings]);
    }

    public function listing()
    {
        $listings = Listing::with('availabilities.service')->get();

        return view('listing')->with(['listings' => $listings]);
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

        return view('appointment')->with(['shop' => $shop, 'user' => $user, 'availables' => $available, 'schedules' => $schedules, 'assign' => $assign]);
    }

    public function record($id)
    {
        $appointment = Appointments::where('id', $id)->first();
        $schedule = Schedule::where('clinic_id', $appointment->listing_id)->get();
        $dentist = User::where('id', $appointment->dentist_id)->first();

        return view('record')->with(['appointment' => $appointment, 'dentist' => $dentist, 'schedules' => $schedule]);
    }

    public function reschedule_appointment_admin(Request $request, $id)
    {
        $appointment = Appointments::find($id);
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

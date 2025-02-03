<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Mail\AppointmentRescheduledMail;
use App\Mail\AppointmentScheduled;
use Illuminate\Support\Facades\Mail;
use App\Models\Assign;
use App\Models\Available;
use App\Models\Listing;
use App\Models\Service;
use App\Models\Schedule;
use App\Models\Temporary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function create_service(Request $request)
    {
        $service = new Service();

        if ($request->hasFile('service_file')) {
            $file = $request->file('service_file');

            $destinationPath = public_path('services_image');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $service->image_path = 'services_image/' . $filename;
        }

        $service->name = $request->service_name;
        $service->description = $request->service_description;

        $hours = intval($request->service_hours) * 60;
        $minutes = intval($request->service_minutes);
        $service->duration = $hours + $minutes;

        $service->price_start = $request->service_price_start;
        $service->price_end = $request->service_price_end;
        $service->save();

        if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 2]);
        } else {
            return redirect('/admin')->with(['page' => 3]);
        }
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function update_patient(Request $request)
    {
        $user = User::find($request->id);

        $request->validate([
            'profile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
            'street_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('profile_images');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $user->image_path = 'profile_images/' . $filename;
        }

        $user->street_name = $request->street_name;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->birthdate = $request->birth;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('superadmin')->with(['page' => 3]);
    }


    public function edit_service(Request $request, $id)
    {
        $service = Service::find($id);

        $service->name = $request->eservice_name;
        $service->description = $request->eservice_description;

        $hours = intval($request->eservice_hours) * 60;
        $minutes = intval($request->eservice_minutes);
        $service->duration = $hours + $minutes;

        $service->price_start = $request->eservice_price_start;
        $service->price_end = $request->eservice_price_end;

        if ($request->hasFile('eservice_file')) {
            $file = $request->file('eservice_file');
            $destinationPath = public_path('services_image');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            $service->image_path = 'services_image/' . $filename;
        }

        $service->save();

        if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 2]);
        } else {
            return redirect('/admin')->with(['page' => 3]);
        }
    }

    public function get_service($id)
    {
        $service = Service::find($id);

        return response()->json(['service' => $service]);
    }

    public function delete_service($id)
    {
        Service::where('id', $id)->delete();

        return redirect('/superadmin')->with(['page' => 3]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function create_dentist(Request $request)
    {
        $validData = $request->validate([
            'fnamed' => 'required|string|max:255',
            'mnamed' => 'nullable|string|max:255',
            'lnamed' => 'required|string|max:255',
            'birthdated' => 'required|date|before:today',
            'sexd' => 'required',
            'phoned' => 'required|digits_between:10,15',
            'emaild' => 'required|email|unique:users,email',
            'street_named' => 'required|string|max:255',
            'cityd' => 'required|string|max:255',
            'provinced' => 'required|string|max:255',
            'postal_coded' => 'required|string|max:20',
            'passwordd' => 'required|string|min:8',
        ]);

        $user = new User();

        $user->fname = $validData['fnamed'];
        $user->mname = $validData['mnamed'];
        $user->lname = $validData['lnamed'];
        $user->birthdate = $validData['birthdated'];
        $user->gender = $validData['sexd'];
        $user->phone = $validData['phoned'];
        $user->email = $validData['emaild'];
        $user->street_name = $validData['street_named'];
        $user->city = $validData['cityd'];
        $user->province = $validData['provinced'];
        $user->postal_code = $validData['postal_coded'];

        $user->password = bcrypt($validData['passwordd']);
        $user->status = 2;

        $user->save();

        return redirect('superadmin')->with(['page' => 4]);
    }

    public function update_dentist(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'fnamee' => 'required|string|max:255',
            'mnamee' => 'nullable|string|max:255',
            'lnamee' => 'required|string|max:255',
            'birthdatee' => 'required|date',
            'sexe' => 'required|integer|in:0,1',
            'phonee' => 'required|string|max:15',
            'emaile' => 'required|email|max:255',
            'street_namee' => 'required|string|max:255',
            'provincee' => 'required|string|max:255',
            'citye' => 'required|string|max:255',
            'postal_codee' => 'required|string|max:10',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',  // Add validation for profile image
        ]);

        $dentist = User::find($request->id);

        // Update the rest of the fields
        $dentist->fname = $request->fnamee;
        $dentist->mname = $request->mnamee;
        $dentist->lname = $request->lnamee;
        $dentist->birthdate = $request->birthdatee;
        $dentist->gender = $request->sexe;
        $dentist->phone = $request->phonee;
        $dentist->email = $request->emaile;
        $dentist->street_name = $request->street_namee;
        $dentist->province = $request->provincee;
        $dentist->city = $request->citye;
        $dentist->postal_code = $request->postal_codee;

        // Save the changes to the user record
        $dentist->save();

        // Redirect based on status
        return redirect('superadmin')->with(['page' => 4]);
    }

    public function get_dentist($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function create_listing(Request $request)
    {
        $listing = new Listing();

        $listing->name = $request->input('listing-name');
        $listing->email = $request->input('listing-email');
        $listing->contact = $request->input('listing-contact');
        $listing->location = $request->input('listing-location');
        $listing->description = $request->input('listing-about');

        if ($request->hasFile('listing-thumbnail')) {
            $file = $request->file('listing-thumbnail');
            $path = $file->storeAs('images', time() . '_' . $file->getClientOriginalName(), 'public');
            $listing->image_path = $path;
        }

        $listing->save();

        // Add services
        $services = $request->input('service', []);
        foreach ($services as $service) {
            $available = new Available();
            $dservice = Service::find($service);

            $available->listing_id = $listing->id;
            $available->service_id = $dservice->id;

            $available->save();
        }

        // Add dentists
        $dentist = $request->input('dent', []);
        foreach ($dentist as $dent) {
            $assign = new Assign();
            $user = User::find($dent);

            $assign->clinic_id = $listing->id;
            $assign->user_id = $user->id;

            $assign->save();
        }

        // Add schedule time
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($days as $day) {
            if ($request->has('listing-' . $day)) {
                $schedule = new Schedule();

                $schedule->clinic_id = $listing->id;
                $schedule->day = ucfirst($day);
                $schedule->start = $request->input($day . '-time-start');
                $schedule->end = $request->input($day . '-time-end');
                $schedule->availability = true;

                $schedule->save();
            }
        }

        if (Auth::user()->status == 2) {
            return redirect('/admin')->with(['page' => 5]);
        } else if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 5]);
        }
    }

    public function edit_listing(Request $request, $id)
    {
        $listing = Listing::find($id);
        $assign = Assign::where('clinic_id', $id)->first();

        $listing->name = $request->input('vlisting-name');
        $listing->email = $request->input('vlisting-email');
        $listing->contact = $request->input('vlisting-contact');
        $listing->location = $request->input('vlisting-location');
        $listing->description = $request->input('vlisting-about');

        if ($request->hasFile('vlisting-thumbnail')) {
            $file = $request->file('vlisting-thumbnail');
            $path = $file->storeAs('images', time() . '_' . $file->getClientOriginalName(), 'public');
            $listing->image_path = $path;
        }

        $listing->save();

        $services = $request->input('vservice', []);

        $current = $listing->availabilities()->pluck('service_id')->toArray();
        $toAdd = array_diff($services, $current);
        $toDelete = array_diff($current, $services);

        Available::where('listing_id', $id)->whereIn('service_id', $toDelete)->delete();

        foreach ($toAdd as $toAddId) {
            $available = new Available();

            $available->listing_id = $listing->id;
            $available->service_id = $toAddId;

            $available->save();
        }

        $dentistIds = $request->input('vdent', []);

        $currentDentists = Assign::where('clinic_id', $id)->pluck('user_id')->toArray();

        $dentistsToAdd = array_diff($dentistIds, $currentDentists);
        $dentistsToRemove = array_diff($currentDentists, $dentistIds);

        Assign::where('clinic_id', $id)->whereIn('user_id', $dentistsToRemove)->delete();

        foreach ($dentistsToAdd as $dentistId) {
            Assign::create([
                'clinic_id' => $id,
                'user_id' => $dentistId,
            ]);
        }

        return redirect('/superadmin')->with(['page' => 5]);
    }

    public function get_listing($id)
    {
        $listing = Listing::find($id);
        $available = Available::where('listing_id', $id)->first();
        $assign = Assign::where('clinic_id', $id)->first();

        if ($available) {
            $selectedServiceIds = Available::where('listing_id', $id)->pluck('service_id')->toArray();

            $services = Service::whereIn('id', $selectedServiceIds)->get();

            $services->each(function ($service) {
                $service->is_selected = true;
            });
        } else {
            $services = Service::all();
        }

        if ($assign) {
            $assigns = $assign->user_id ? User::where('id', $assign->user_id)->get() : collect();
        } else {
            $assigns = collect();
        }

        $schedule = Schedule::where('clinic_id', $id)->get();

        return response()->json(['listing' => $listing, 'services' => $services, 'schedules' => $schedule, 'assign' => $assigns]);
    }


    public function delete_listing($id)
    {
        Listing::where('id', $id)->delete();

        return redirect('/superadmin')->with(['page' => 5]);
    }

    public function create_collab(Request $request)
    {
        $user = User::where('email', $request->input('collab-email'))->where('status', 0)->first();

        if ($user) {
            $user->status = $request->input('collab-position');
            $user->date_collab = Carbon::now();
            $user->save();
        }

        return redirect('/admin')->with(['page' => 7]);
    }

    public function edit_collab(Request $request, $id)
    {
        $user = User::find($id);

        $user->status = $request->input('ecollab-position');

        $user->save();

        return redirect('/admin')->with(['page' => 7]);
    }

    public function get_collab($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function remove_collab($id)
    {
        $user = User::find($id);

        $user->status = 0;

        $user->save();

        return redirect('/admin')->with(['page' => 7]);
    }

    public function create_appointment(Request $request, $id)
    {
        if ($request->whofor != 2) {
            $services = $request->appointments[0]['services'] ?? [];
            $appointmentTimes = $request->appointments[0]['time'] ?? [];
            $dentistId = $request->appointments[0]['dentist'] ?? null;

            foreach ($services as $serviceId) {
                $appointmentTime = $appointmentTimes[$serviceId] ?? null;

                if ($appointmentTime) {
                    $service = Service::findOrFail($serviceId);
                    $duration = $service->duration;
                    $newStart = \Carbon\Carbon::parse($appointmentTime);
                    $newEnd = $newStart->copy()->addMinutes($duration);

                    $overlapping = Appointments::join('services', 'appointments.service_id', '=', 'services.id')
                        ->where('appointments.listing_id', $id)
                        ->where('appointments.dentist_id', $dentistId)
                        ->where(function ($query) use ($newStart, $newEnd) {
                            $query->where(function ($q) use ($newStart, $newEnd) {
                                $q->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) < ?', [$newEnd->toDateTimeString()])
                                    ->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) + INTERVAL services.duration MINUTE > ?', [$newStart->toDateTimeString()]);
                            });
                        })
                        ->exists();

                    if ($overlapping) {
                        return redirect()->back()->withErrors(['msg' => 'There is already a scheduled appointment for the chosen Date and Time, please choose another.']);
                    }

                    $appointment = new Appointments();
                    $appointment->user_id = Auth::user()->id;
                    $appointment->service_id = $service->id;
                    $appointment->listing_id = Listing::find($id)->id;
                    $appointment->appointment_time = $appointmentTime;
                    $appointment->dentist_id = $dentistId;
                    $appointment->status = 'Pending';

                    if ($request->whofor == 1) {
                        $appointment->temporary = json_encode([
                            'fname' => $request->fname,
                            'mname' => $request->mname ?? '',
                            'lname' => $request->lname,
                            'email' => $request->email,
                            'phone' => $request->contact,
                            'birth' => $request->birthdate,
                        ]);
                    }

                    $appointment->save();

                    // Send email to patient, dentist, and superadmin
                    $this->sendAppointmentEmail($appointment);
                }
            }
        } else {
            foreach ($request->appointments as $appointmentData) {
                $services = $appointmentData['services'] ?? [];
                $appointmentTimes = $appointmentData['time'] ?? [];
                $dentistId = $appointmentData['dentist'] ?? null;

                foreach ($services as $serviceId) {
                    $appointmentTime = $appointmentTimes[$serviceId] ?? null;

                    if ($appointmentTime) {
                        $service = Service::findOrFail($serviceId);
                        $duration = $service->duration;
                        $newStart = \Carbon\Carbon::parse($appointmentTime);
                        $newEnd = $newStart->copy()->addMinutes($duration);

                        $overlapping = Appointments::join('services', 'appointments.service_id', '=', 'services.id')
                            ->where('appointments.listing_id', $id)
                            ->where('appointments.dentist_id', $dentistId)
                            ->where(function ($query) use ($newStart, $newEnd) {
                                $query->where(function ($q) use ($newStart, $newEnd) {
                                    $q->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) < ?', [$newEnd->toDateTimeString()])
                                        ->whereRaw('COALESCE(appointments.rescheduled_time, appointments.appointment_time) + INTERVAL services.duration MINUTE > ?', [$newStart->toDateTimeString()]);
                                });
                            })
                            ->exists();

                        if ($overlapping) {
                            return redirect()->back()->withErrors(['msg' => 'The selected time overlaps with an existing appointment.']);
                        }

                        $appointment = new Appointments();
                        $existing = User::where('fname', $appointmentData['fname'])
                            ->where('lname', $appointmentData['lname'])
                            ->first();

                        $appointment->user_id = Auth::user()->id;
                        $appointment->service_id = $service->id;
                        $appointment->listing_id = Listing::find($id)->id;
                        $appointment->appointment_time = $appointmentTime;
                        $appointment->dentist_id = $dentistId;
                        $appointment->status = 'Pending';

                        if (!$existing) {
                            $appointment->temporary = json_encode([
                                'fname' => $appointmentData['fname'],
                                'mname' => $appointmentData['mname'] ?? '',
                                'lname' => $appointmentData['lname'],
                                'email' => $appointmentData['email'],
                                'phone' => $appointmentData['contact'],
                                'birth' => $appointmentData['birthdate'],
                            ]);
                        }

                        $appointment->save();

                        // Send email to patient, dentist, and superadmin
                        $this->sendAppointmentEmail($appointment);
                    }
                }
            }
        }

        return redirect('user-profile');
    }

    private function sendAppointmentEmail($appointment)
    {
        $patient = User::find($appointment->user_id);
        $dentist = User::find($appointment->dentist_id);
        $superadmins = User::where('status', 3)->get(); // Retrieve all superadmins
        $clinic = Listing::find($appointment->listing_id);
        $service = Service::find($appointment->service_id);

        $details = [
            'patient_name' => $patient->fname . ' ' . $patient->lname,
            'birthdate' => $patient->birthdate,
            'street_name' => $patient->street_name,
            'city' => $patient->city,
            'province' => $patient->province,
            'email' => $patient->email,
            'contact_number' => $patient->phone,
            'appointment_time' => $appointment->appointment_time,
            'dentist_name' => $dentist->fname . ' ' . $dentist->lname,
            'service_name' => $service->name,
            'clinic_name' => $clinic->name,
        ];

        // Send email to patient
        if ($patient->status == 0) {
            Mail::to($patient->email)->send(new AppointmentScheduled($details));
        }

        // Send email to dentist
        if ($dentist->status == 2) {
            Mail::to($dentist->email)->send(new AppointmentScheduled($details));
        }

        // Send email to all superadmins
        foreach ($superadmins as $superadmin) {
            Mail::to($superadmin->email)->send(new AppointmentScheduled($details));
        }
    }



    public function appointment_status(Request $request, $id)
    {
        $appointment = Appointments::find($id);
        $allappoints = Appointments::all();

        $appointment->status = $request->status;
        $appointment->save();

        if (Auth::user()->status) {
            return view('record')->with(['appointment' => $appointment]);
        } else {
            return redirect('/user-record/' . $id);
        }
    }

    public function record_user($id)
    {
        $appointment = Appointments::where('id', $id)->first();
        $schedule = Schedule::where('clinic_id', $appointment->listing_id)->get();
        $dentist = User::where('id', $appointment->dentist_id)->first();

        return view('record_user')->with(['appointment' => $appointment, 'dentist' => $dentist, 'schedules' => $schedule]);
    }

    public function reschedule_appointment(Request $request, $id)
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

    public function forget_password() {}
}

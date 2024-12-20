<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
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

class AdminController extends Controller
{
    public function create_service (Request $request) {
        $service = new Service();

        if ($request->hasFile('service_file')) {
            $file = $request->file('service_file');
            $path = $file->storeAs('images', time() . '_' . $file->getClientOriginalName(), 'public');
            $service->image_path = $path;
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

    public function edit_service (Request $request, $id) {
        $service = Service::find($id);

        if ($request->hasFile('eservice_file')) {
            $file = $request->file('eservice_file');
            $path = $file->storeAs('images', time() . '_' . $file->getClientOriginalName(), 'public');
            $service->image_path = $path;
        }

        $service->name = $request->eservice_name;
        $service->description = $request->eservice_description;

        $hours = intval($request->eservice_hours) * 60;
        $minutes = intval($request->eservice_minutes);
        $service->duration = $hours + $minutes;

        $service->price_start = $request->eservice_price_start;
        $service->price_end = $request->eservice_price_end;
        $service->save();

        if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 2]);
        } else {
            return redirect('/admin')->with(['page' => 3]);
        }
    }

    public function get_service ($id) {
        $service = Service::find($id);

        return response()->json(['service' => $service]);
    }

    public function delete_service ($id) {
        Service::where('id', $id)->delete();

        return redirect('/admin')->with(['page' => 3]);
    }

    public function create_dentist (Request $request) {
        $validData = $request->validate([
            'fnamed' => 'required|string|max:255',
            'mnamed' => 'nullable|string|max:255',
            'lnamed' => 'required|string|max:255',
            'birthdated' => 'required|date|before:today',
            'sexd' => 'required',
            'phoned' => 'required|digits_between:10,15',
            'emaild' => 'required|email|unique:users,email',
            'addressd' => 'required|string|max:255',
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
        $user->address = $validData['addressd'];
        $user->password = bcrypt($validData['passwordd']);
        $user->status = 2;

        $user->save();

        return redirect('superadmin')->with(['page' => 4]);
    }

    public function get_dentist ($id) {
        $user = User::find($id);
        
        return response()->json(['user' => $user]);
    }

    public function create_listing (Request $request) {
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

    public function edit_listing (Request $request, $id) {
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

    public function get_listing ($id) {
        $listing = Listing::find($id);
        $available = Available::where('listing_id', $id)->first();
        $assign = Assign::where('clinic_id', $id)->first();
        
        if ($available) {
            $services = $available->service_id ? Service::where('id', $available->service_id)->get() : collect();
        } else {
            $services = collect();
        }

        if ($assign) {
            $assigns = $assign->user_id ? User::where('id', $assign->user_id)->get() : collect();
        } else {
            $assigns = collect();
        }

        $schedule = Schedule::where('clinic_id', $id)->get();

        return response()->json(['listing' => $listing, 'services' => $services, 'schedules' => $schedule, 'assign' => $assigns]);
    }

    public function delete_listing ($id) {
        Listing::where('id', $id)->delete();

        return redirect('/superadmin')->with(['page' => 5]);
    }

    public function create_collab (Request $request) {
        $user = User::where('email', $request->input('collab-email'))->where('status', 0)->first();

        if ($user) {
            $user->status = $request->input('collab-position');
            $user->date_collab = Carbon::now();
            $user->save();
        }

        return redirect('/admin')->with(['page' => 7]);
    }

    public function edit_collab (Request $request, $id) {
        $user = User::find($id);

        $user->status = $request->input('ecollab-position');
        
        $user->save();

        return redirect('/admin')->with(['page' => 7]);
    }

    public function get_collab ($id) {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function remove_collab ($id) {
        $user = User::find($id);

        $user->status = 0;

        $user->save();

        return redirect('/admin')->with(['page' => 7]);
    }

    public function create_appointment (Request $request, $id) {
        if ($request->whofor != 2) {
            $appointment = new Appointments();

            $appointment->user_id = Auth::user()->id;
            $appointment->service_id = Service::where('id', $request->appointments[0]['service'])->first()->id;
            $appointment->listing_id = Listing::where('id', $id)->first()->id;
            $appointment->appointment_time = $request->appointments[0]['time'];
            $appointment->dentist_id = $request->appointments[0]['dentist'];
            $appointment->status = 'Pending';

            if ($request->whofor == 1) {
                $appointment->temporary = json_encode([
                    'fname' => $request->fname,
                    'mname' => $request->mname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->contact,
                    'birth' => $request->birthdate,
                ]);
            }

            $appointment->save();

            return redirect('/user-profile');
        } else {
            foreach ($request->appointments as $appointmentData) {
                $appointment = new Appointments();
                
                $existing = User::where('fname', $appointmentData['fname'])->where('lname', $appointmentData['lname'])->first();

                if ($existing) {
                    $appointment->user_id = Auth::user()->id;
                    $appointment->service_id = Service::where('id', $appointmentData['service'])->first()->id;
                    $appointment->listing_id = Listing::where('id', $id)->first()->id;
                    $appointment->appointment_time = $appointmentData['time'];
                    $appointment->dentist_id = $appointmentData['dentist'];
                    $appointment->status = 'Pending';
                } else {
                    $appointment->user_id = Auth::user()->id;
                    $appointment->service_id = Service::where('id', $appointmentData['service'])->first()->id;
                    $appointment->listing_id = Listing::where('id', $id)->first()->id;
                    $appointment->appointment_time = $appointmentData['time'];
                    $appointment->dentist_id = $appointmentData['dentist'];
                    $appointment->status = 'Pending';
                
                    $appointment->temporary = json_encode([
                        'fname' => $appointmentData['fname'],
                        'mname' => $appointmentData['mname'],
                        'lname' => $appointmentData['lname'],
                        'email' => $appointmentData['email'],
                        'phone' => $appointmentData['contact'],
                        'birth' => $appointmentData['birthdate'],
                    ]);
                }
            
                $appointment->save();
            }            
        }

        return redirect('user-profile');
    }

    public function appointment_status (Request $request, $id) {
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

    public function record_user ($id) {
        $appointment = Appointments::where('id', $id)->first();
        $schedule = Schedule::where('clinic_id', $appointment->listing_id)->get();
        $dentist = User::where('id', $appointment->dentist_id)->first();

        return view('record_user')->with(['appointment' => $appointment, 'dentist' => $dentist, 'schedules' => $schedule]);
    }

    public function reschedule_appointment (Request $request, $id) {
        $appointment = Appointments::find($id);
        $appointment->rescheduled_time = $request->schedule;
        $appointment->status = 'Rescheduled';
        $appointment->save();

        return redirect('/user-record/' . $id);
    }

    public function forget_password () {
        
    }
}

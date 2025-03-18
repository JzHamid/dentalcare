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
use Illuminate\Support\Facades\DB;

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

        $successMessage = 'Service "' . $service->name . '" has been successfully created!';

        if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 8, 'success' => $successMessage]);
        } else {
            return redirect('/admin')->with(['page' => 3, 'success' => $successMessage]);
        }
    }


    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // public function update_patient(Request $request)
    // {
    //     $user = User::find($request->id);

    //     $request->validate([
    //         'profile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
    //         'street_name' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'province' => 'required|string|max:255',
    //         'postal_code' => 'required|string|max:10',
    //     ]);

    //     if ($request->hasFile('profile')) {
    //         $file = $request->file('profile');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $destinationPath = public_path('profile_images');

    //         if (!file_exists($destinationPath)) {
    //             mkdir($destinationPath, 0777, true);
    //         }

    //         $file->move($destinationPath, $filename);
    //         $user->image_path = 'profile_images/' . $filename;
    //     }

    //     $user->street_name = $request->street_name;
    //     $user->city = $request->city;
    //     $user->province = $request->province;
    //     $user->postal_code = $request->postal_code;
    //     $user->fname = $request->fname;
    //     $user->mname = $request->mname;
    //     $user->lname = $request->lname;
    //     $user->birthdate = $request->birth;
    //     $user->gender = $request->gender;
    //     $user->phone = $request->phone;
    //     $user->email = $request->email;

    //     $user->save();

    //     return redirect()->route('superadmin')->with(['page' => 3]);
    // }


    public function edit_service(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

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

        $successMessage = 'Service "' . $service->name . '" has been successfully updated!';

        if (Auth::user()->status == 3) {
            return redirect('/superadmin')->with(['page' => 8, 'success' => $successMessage]);
        } else {
            return redirect('/admin')->with(['page' => 3, 'success' => $successMessage]);
        }
    }


    public function get_service($id)
    {
        $service = Service::find($id);

        return response()->json(['service' => $service]);
    }

    public function delete_service($id)
    {
        $service = Service::findOrFail($id);
        $serviceName = $service->name; // Get the service name before deletion
        $service->delete();

        $successMessage = "Service '$serviceName' has been successfully deleted!";

        return redirect('/superadmin')->with(['page' => 8, 'success' => $successMessage]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->fname . ' ' . $user->lname; // Get the user's full name before deletion
        $user->delete();

        $successMessage = "User $userName has been successfully deleted!";

        return redirect()->back()->with(['page' => 7, 'success' => $successMessage]);
    }

    public function destroy_secretary($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->fname . ' ' . $user->lname; // Get the user's full name before deletion
        $user->delete();

        $successMessage = "User $userName has been successfully deleted!";

        return redirect()->back()->with(['page' => 6, 'success' => $successMessage]);
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
        $user->verified = 1;
        $user->status = 2;

        $user->save();

        $successMessage = 'Dentist ' . $user->fname . ' ' . $user->lname . ' has been successfully created!';

        return redirect('superadmin')->with(['page' => 4, 'success' => $successMessage]);
    }



    public function create_secretary(Request $request)
    {
        $validData = $request->validate([
            'fnames' => 'required|string|max:255',
            'mnames' => 'nullable|string|max:255',
            'lnames' => 'required|string|max:255',
            'birthdates' => 'required|date|before:today',
            'sexs' => 'required',
            'phones' => 'required|digits_between:10,15',
            'emails' => 'required|email|unique:users,email',
            'street_names' => 'required|string|max:255',
            'citys' => 'required|string|max:255',
            'provinces' => 'required|string|max:255',
            'postal_codes' => 'required|string|max:20',
            'passwords' => 'required|string|min:8',
        ]);

        $user = new User();

        $user->fname = $validData['fnames'];
        $user->mname = $validData['mnames'];
        $user->lname = $validData['lnames'];
        $user->birthdate = $validData['birthdates'];
        $user->gender = $validData['sexs'];
        $user->phone = $validData['phones'];
        $user->email = $validData['emails'];
        $user->street_name = $validData['street_names'];
        $user->city = $validData['citys'];
        $user->province = $validData['provinces'];
        $user->postal_code = $validData['postal_codes'];
        $user->verified = 1;
        $user->password = bcrypt($validData['passwords']);
        $user->status = 1;

        $user->save();

        $successMessage = "Secretary {$user->fname} {$user->lname} has been successfully created!";

        return redirect('superadmin')->with(['page' => 6, 'success' => $successMessage]);
    }

    public function unassignSecretary($userId)
    {
        DB::table('available_dentist')
            ->where('secretary_id', $userId)
            ->update(['secretary_id' => null]); // Set secretary_id to NULL
    
        return redirect()->back()->with('success', 'Secretary unassigned successfully.');
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

        $successMessage = 'Dentist ' . $dentist->fname . ' ' . $dentist->lname . ' has been successfully updated!';

        return redirect('superadmin')->with(['page' => 4, 'success' => $successMessage]);
    }

    public function update_secretary(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'fnamesec' => 'required|string|max:255',
            'mnamesec' => 'nullable|string|max:255',
            'lnamesec' => 'required|string|max:255',
            'birthdatesec' => 'required|date',
            'sexsec' => 'required|integer|in:0,1',
            'phonesec' => 'required|string|max:15',
            'emailsec' => 'required|email|max:255',
            'profilesec' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',  // Add validation for profile image
        ]);

        $secretary = User::find($request->id);

        // Update the fields
        $secretary->fname = $request->fnamesec;
        $secretary->mname = $request->mnamesec;
        $secretary->lname = $request->lnamesec;
        $secretary->birthdate = $request->birthdatesec;
        $secretary->gender = $request->sexsec;
        $secretary->phone = $request->phonesec;
        $secretary->email = $request->emailsec;
        $secretary->street_name = $request->street_namesec;
        $secretary->province = $request->provincesec;
        $secretary->city = $request->citysec;
        $secretary->postal_code = $request->postal_codesec;

        // Save the changes
        $secretary->save();

        // Success message
        $successMessage = "Secretary {$secretary->fname} {$secretary->lname} has been successfully updated!";

        return redirect('superadmin')->with(['page' => 6, 'success' => $successMessage]);
    }


    public function update_patient(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'fnamep' => 'required|string|max:255',
            'mnamep' => 'nullable|string|max:255',
            'lnamep' => 'required|string|max:255',
            'birthdatep' => 'required|date',
            'sexp' => 'required|integer|in:0,1',
            'phonep' => 'required|string|max:15',
            'emailp' => 'required|email|max:255',
            // 'street_namesec' => 'required|string|max:255',
            // 'provincesec' => 'required|string|max:255',
            // 'citysec' => 'required|string|max:255',
            // 'postal_codesec' => 'required|string|max:10',
            // 'profilep' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',  // Add validation for profile image
        ]);

        $dentist = User::find($request->id);

        // Update the rest of the fields
        $dentist->fname = $request->fnamep;
        $dentist->mname = $request->mnamep;
        $dentist->lname = $request->lnamep;
        $dentist->birthdate = $request->birthdatep;
        $dentist->gender = $request->sexp;
        $dentist->phone = $request->phonep;
        $dentist->email = $request->emailp;
        $dentist->street_name = $request->street_namep;
        $dentist->province = $request->provincep;
        $dentist->city = $request->cityp;
        $dentist->postal_code = $request->postal_codep;

        // Save the changes to the user record
        $dentist->save();

        // Redirect based on status
        return redirect('superadmin')->with(['page' => 7]);
    }

    public function get_dentist($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function get_secretary($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }


    public function get_patient($id)
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
        $listing->barangay = $request->input('barangay'); 
        $listing->street_address = $request->input('street_address'); 
        $listing->description = $request->input('listing-about');

        if ($request->hasFile('listing-thumbnail')) {
            $file = $request->file('listing-thumbnail');
            $destinationPath = public_path('services_image');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $path = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $path);
            $listing->image_path = 'services_image/' . $path;
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

        $redirectPath = Auth::user()->status == 2 ? '/admin' : '/superadmin';

        // Success message
        $successMessage = "Listing '{$listing->name}' has been successfully created!";

        return redirect($redirectPath)->with(['page' => 5, 'success' => $successMessage]);
    }

    public function edit_listing(Request $request, $id)
    {
        $listing = Listing::find($id);

        $listing->name = $request->input('vlisting-name');
        $listing->email = $request->input('vlisting-email');
        $listing->contact = $request->input('vlisting-contact');
        $listing->barangay = $request->input('vlisting-barangay'); 
        $listing->street_address = $request->input('vlisting-street'); 
        $listing->description = $request->input('vlisting-about');

        if ($request->hasFile('vlisting-thumbnail')) {
            $file = $request->file('vlisting-thumbnail');
            $destinationPath = public_path('services_image');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $path = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $path);
            $listing->image_path = 'services_image/' . $path;
        }

        $listing->save();

        // Handle services
        $services = $request->input('vservice', []);
        $current = $listing->availabilities()->pluck('service_id')->toArray();
        $toAdd = array_diff($services, $current);
        $toDelete = array_diff($current, $services);

        Available::where('listing_id', $id)->whereIn('service_id', $toDelete)->delete();

        foreach ($toAdd as $toAddId) {
            Available::create([
                'listing_id' => $listing->id,
                'service_id' => $toAddId
            ]);
        }

        // Handle multiple dentists properly
        $dentistIds = $request->input('vdent', []); // This should be an array

        // Retrieve currently assigned dentists
        $currentDentists = Assign::where('clinic_id', $id)->pluck('user_id')->toArray();

        // Find dentists to add and remove
        $dentistsToAdd = array_diff($dentistIds, $currentDentists);
        $dentistsToRemove = array_diff($currentDentists, $dentistIds);

        // Remove unselected dentists
        Assign::where('clinic_id', $id)->whereIn('user_id', $dentistsToRemove)->delete();

        // Add new dentists
        foreach ($dentistsToAdd as $dentistId) {
            Assign::create([
                'clinic_id' => $id,
                'user_id' => $dentistId,
            ]);
        }

        // ---- New: Handle schedules ----
        // Define the days corresponding to your input names (in lowercase)
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($days as $day) {
            // Checkbox input name: e.g. "vlisting-monday"
            $checkboxName = 'vlisting-' . $day;
            // Time input names: e.g. "vmonday-time-start", "vmonday-time-end"
            $startName = 'v' . $day . '-time-start';
            $endName = 'v' . $day . '-time-end';

            if ($request->has($checkboxName)) {
                $start = $request->input($startName);
                $end = $request->input($endName);
                // Proceed only if both start and end times are provided
                if ($start && $end) {
                    // Update or create schedule record for this day.
                    // Note: Adjust the case of the day as stored in your DB if needed.
                    Schedule::updateOrCreate(
                        ['clinic_id' => $id, 'day' => ucfirst($day)],
                        ['start' => $start, 'end' => $end, 'availability' => 1]
                    );
                }
            } else {
                // If the checkbox is unchecked, remove the schedule for that day if it exists.
                Schedule::where('clinic_id', $id)->where('day', ucfirst($day))->delete();
            }
        }
        // ---- End schedule handling ----

        return redirect('/superadmin')->with(['page' => 5, 'success' => 'Successfully Edited Listing']);
    }



    public function get_listing($id)
    {
        $listing = Listing::find($id);

        // Get all available services for the listing
        $available = Available::where('listing_id', $id)->first(); // This could stay as first() if you just need to check existence
        if ($available) {
            $selectedServiceIds = Available::where('listing_id', $id)->pluck('service_id')->toArray();
            $services = Service::whereIn('id', $selectedServiceIds)->get();
            $services->each(function ($service) {
                $service->is_selected = true;
            });
        } else {
            $services = Service::all();
        }

        // Get all assigned dentists (not just the first one)
        $assigns = Assign::where('clinic_id', $id)->get(); // Use get() to retrieve all assignments
        $dentistIds = $assigns->pluck('user_id')->toArray(); // Extract all user_ids
        $assignedDentists = $dentistIds ? User::whereIn('id', $dentistIds)->get() : collect();

        // Get all schedules
        $schedule = Schedule::where('clinic_id', $id)->get();

        return response()->json([
            'listing' => $listing,
            'services' => $services,
            'schedules' => $schedule,
            'assign' => $assignedDentists // Return all assigned dentists
        ]);
    }


    public function delete_listing($id)
    {
        // Find the listing
        $listing = Listing::find($id);

        if (!$listing) {
            return redirect('/superadmin')->with(['page' => 5, 'error' => 'Listing not found.']);
        }

        // Delete related records to maintain data integrity
        Available::where('listing_id', $listing->id)->delete();  // Remove associated services
        Assign::where('clinic_id', $listing->id)->delete();      // Remove assigned dentists
        Schedule::where('clinic_id', $listing->id)->delete();    // Remove associated schedules

        // Delete the listing itself
        $listing->delete();

        // Success message
        return redirect('/superadmin')->with(['page' => 5, 'success' => "Listing '{$listing->name}' has been deleted successfully."]);
    }


    public function showAddCollaboratorModal()
    {
        // Fetch all secretaries (status = 1)
        $secretaries = User::where('status', 1)->get();

        // Pass the secretaries to the view
        return view('admin', compact('secretaries'));
    }

    public function saveCollaboration(Request $request)
    {
        // Validate the request
        $request->validate([
            'secretary_id' => 'required|exists:users,id',
        ]);

        // Get the logged-in user (dentist)
        $dentist = Auth::user();

        // Check if the dentist already has a record in the available_dentist table
        $existingAssignment = Assign::where('user_id', $dentist->id)->first();

        if ($existingAssignment) {
            // Update the existing record with the new secretary_id
            $existingAssignment->update([
                'secretary_id' => $request->input('secretary_id'),
            ]);
        } else {
            // Create a new record if no existing entry is found
            Assign::create([
                'user_id' => $dentist->id, // Dentist's ID
                'clinic_id' => $request->input('clinic_id'), // Clinic ID
                'secretary_id' => $request->input('secretary_id'), // Secretary's ID
            ]);
        }

        // Redirect back with a success message
        return redirect('/admin')->with(['page' => 10, 'success' => 'Successfully added a Secretary']);
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

    public function create_appointment(Request $request, $id)
    {
        try {
            if ($request->whofor != 2) {
                $services = $request->appointments[0]['services'] ?? [];
                $appointmentTimes = $request->appointments[0]['time'] ?? [];
                $dentistId = $request->appointments[0]['dentist'] ?? null;

                foreach ($services as $serviceId) {
                    $appointmentTime = $appointmentTimes[$serviceId] ?? null;

                    if ($appointmentTime) {
                        $service = Service::findOrFail($serviceId);
                        $duration = $service->duration;
                        $newStart = Carbon::parse($appointmentTime);
                        $newEnd = $newStart->copy()->addMinutes($duration);

                        // Check business hours
                        // if (!$this->isWithinClinicHours($id, $newStart, $newEnd)) {
                        //     return response()->json([
                        //         'status' => 'error',
                        //         'message' => 'The appointment time is outside the clinic\'s business hours.'
                        //     ], 400);
                        // }

                        // Check for overlapping appointments
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

                        // Create appointment
                        $appointment = new Appointments();
                        $appointment->user_id = Auth::user()->id;
                        $appointment->service_id = $service->id;
                        $appointment->listing_id = Listing::find($id)->id;
                        $appointment->appointment_time = $appointmentTime;
                        $appointment->dentist_id = $dentistId;
                        $appointment->status = 'Pending';
                        $appointment->save();

                        // Handle guest details
                        if ($request->whofor == 1) {
                            $guestData = $request->appointments[0];
                            $appointment->guest()->create([
                                'name' => $guestData['fname'],
                                'middlename' => $guestData['mname'] ?? '',
                                'lastname' => $guestData['lname'],
                                'email' => $guestData['email'],
                                'contact' => $guestData['contact'],
                                'sex' => $guestData['sex'],
                            ]);
                        }

                        $this->sendAppointmentEmail($appointment);
                    }
                }
            } else {
                // Handle multiple appointments (for multiple people)
                foreach ($request->appointments as $appointmentData) {
                    $services = $appointmentData['services'] ?? [];
                    $appointmentTimes = $appointmentData['time'] ?? [];
                    $dentistId = $appointmentData['dentist'] ?? null;

                    foreach ($services as $serviceId) {
                        $appointmentTime = $appointmentTimes[$serviceId] ?? null;

                        if ($appointmentTime) {
                            $service = Service::findOrFail($serviceId);
                            $duration = $service->duration;
                            $newStart = Carbon::parse($appointmentTime);
                            $newEnd = $newStart->copy()->addMinutes($duration);

                            // --- Business Hours Check Start ---
                            if (!$this->isWithinClinicHours($id, $newStart, $newEnd)) {
                                return redirect()->back()->withErrors([
                                    'msg' => 'The appointment time is outside the clinics business hours.'
                                ]);
                            }
                            // --- Business Hours Check End ---

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
                                return redirect()->back()->withErrors([
                                    'msg' => 'The selected time overlaps with an existing appointment.'
                                ]);
                            }

                            $appointment = new Appointments();
                            $appointment->user_id = Auth::user()->id;
                            $appointment->service_id = $service->id;
                            $appointment->listing_id = Listing::find($id)->id;
                            $appointment->appointment_time = $appointmentTime;
                            $appointment->dentist_id = $dentistId;
                            $appointment->status = 'Pending';
                            $appointment->save();

                            // Save guest details for each appointment
                            $appointment->guest()->create([
                                'name' => $appointmentData['fname'],
                                'middlename' => $appointmentData['mname'] ?? '',
                                'lastname' => $appointmentData['lname'],
                                'email' => $appointmentData['email'],
                                'contact' => $appointmentData['contact'],
                                'sex' => $appointmentData['sex'],
                            ]);

                            // Send email to patient, dentist, and superadmin
                            $this->sendAppointmentEmail($appointment);
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment booked successfully!',
                'redirect' => route('user')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while booking the appointment.'
            ], 500);
        }
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

        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $allappoints = Appointments::all();
        $appointment->status = $request->status;
        $appointment->save();

        $shop = Listing::find($appointment->clinic_id);

        if (!$shop) {
            return redirect()->back()->with('error', 'Clinic not found.');
        }

        $user = Auth::user();
        $available = Available::where('listing_id', $shop->id)->get();
        $schedules = Schedule::where('clinic_id', $shop->id)->get();
        $assign = Assign::where('clinic_id', $shop->id)->get();

        if ($user->status) {
            return view('record')->with([
                'appointment' => $appointment,
                'shop' => $shop,
                'user' => $user,
                'availables' => $available,
                'schedules' => $schedules,
                'assign' => $assign,
            ]);
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

    public function reschedule_appointment_dentist(Request $request, $id)
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

        return redirect('/record/' . $id)->with('success', 'Appointment rescheduled and notifications sent to the patient, dentist, and superadmins.');
    }



    public function forget_password() {}
}

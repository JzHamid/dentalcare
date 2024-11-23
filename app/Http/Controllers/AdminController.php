<?php

namespace App\Http\Controllers;

use App\Models\Available;
use App\Models\Listing;
use App\Models\Service;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_service (Request $request) {
        $service = new Service();

        $service->name = $request->service_name;
        $service->description = $request->service_description;

        $hours = intval($request->service_hours) * 60;
        $minutes = intval($request->service_minutes);
        $service->duration = $hours + $minutes;

        $service->price_start = $request->service_price_start;
        $service->price_end = $request->service_price_end;
        $service->save();

        return redirect('/admin')->with(['page' => 3]);
    }

    public function edit_service (Request $request, $id) {
        $service = Service::find($id);

        $service->name = $request->eservice_name;
        $service->description = $request->eservice_description;

        $hours = intval($request->eservice_hours) * 60;
        $minutes = intval($request->eservice_minutes);
        $service->duration = $hours + $minutes;

        $service->price_start = $request->eservice_price_start;
        $service->price_end = $request->eservice_price_end;
        $service->save();

        return redirect('/admin')->with(['page' => 3]); 
    }

    public function get_service ($id) {
        $service = Service::find($id);

        return response()->json(['service' => $service]);
    }

    public function delete_service ($id) {
        Service::where('id', $id)->delete();

        return redirect('/admin')->with(['page' => 3]);
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

        $services = $request->input('service', []);
        foreach ($services as $service) {
            $available = new Available();
            $dservice = Service::find($service);

            $available->clinic_id = $listing->id;
            $available->service_id = $dservice->id;

            $available->save();
        }

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

        return redirect('/admin')->with(['page' => 5]);
    }

    public function edit_listing (Request $request, $id) {
        $listing = Listing::find($id);

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

            $available->clinic_id = $listing->id;
            $available->service_id = $toAddId;

            $available->save();
        }

        return redirect('/admin')->with(['page' => 5]);
    }

    public function get_listing ($id) {
        $listing = Listing::find($id);
        $available = Available::where('listing_id', $id)->first();
        
        if ($available) {
            $services = $available->service_id ? Service::where('id', $available->service_id)->get() : collect();
        } else {
            $services = collect();
        }

        $schedule = Schedule::where('clinic_id', $id)->get();

        return response()->json(['listing' => $listing, 'services' => $services, 'schedules' => $schedule]);
    }

    public function delete_listing ($id) {
        Listing::where('id', $id)->delete();

        return redirect('/admin')->with(['page' => 5]);
    }

    public function create_collab (Request $request) {
        $user = User::where('email', $request->input('collab-email'))->where('status', 0)->first();

        if ($user) {
            $user->status = $request->input('collab-position');
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
}

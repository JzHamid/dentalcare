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

class PageController extends Controller
{
    public function index () {
        $services = Service::all();

        if (Auth::check()) {
            return view('landing')->with(['logged' => true, 'services' => $services]);
        } else {
            return view('landing')->with(['services' => $services]);
        }
    }

    public function user () {
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

    public function admin () {
        $log = Auth::user();
        $appointments = Appointments::all();
        $services = Service::all();
        $assign = Assign::where('user_id', $log->id)->get();

        $users = User::all();

        return view('admin')->with(['appointments' => $appointments, 'services' => $services, 'listings' => $assign, 'users' => $users, 'log' => $log, 'is_online' => $log->is_online]);
    }

    public function superadmin() {
        $appointments = Appointments::all();
        $dentist = User::where('status', 2)->get();
        $users = User::where('status', 0)->get();
        $services = Service::all();
        $listings = Listing::all();
        
        return view('superadmin')->with(['dentist' => $dentist, 'users' => $users, 'appointments' => $appointments, 'services' => $services, 'listings' => $listings]);
    }

    public function listing () {
        $listings = Listing::with('availabilities.service')->get();

        return view('listing')->with(['listings' => $listings]);
    }

    public function shop ($id) {
        $shop = Listing::find($id);
        $available = Available::where('listing_id', $shop->id)->get();
        $assign = Assign::where('clinic_id', $shop->id)->get();

        return view('shop')->with(['shop' => $shop, 'availables' => $available, 'assigns' => $assign]);
    }

    public function appointment ($id) {
        $shop = Listing::find($id);
        $user = Auth::user();
        $available = Available::where('listing_id', $shop->id)->get();
        $schedules = Schedule::where('clinic_id', $shop->id)->get();
        $assign = Assign::where('clinic_id', $id)->get();

        return view('appointment')->with(['shop' => $shop, 'user' => $user, 'availables' => $available, 'schedules' => $schedules, 'assign' => $assign]);
    }

    public function record ($id) {
        $appointment = Appointments::find($id);
        $dentist = User::where('id', $appointment->dentist_id)->first();

        return view('record')->with(['appointment' => $appointment]);
    }
}

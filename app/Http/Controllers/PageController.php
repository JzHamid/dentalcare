<?php

namespace App\Http\Controllers;

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
        if (Auth::check()) {
            return view('landing')->with('logged', true);
        } else {
            return view('landing');
        }
    }

    public function user () {
        $user = Auth::user();

        return view('user')->with(['logged' => true, 'user' => $user]);
    }

    public function admin () {
        $services = Service::all();
        $listings = Listing::all();
        $users = User::all();
        $log = Auth::user();

        return view('admin')->with(['services' => $services, 'listings' => $listings, 'users' => $users, 'log' => $log, 'is_online' => $log->is_online]);
    }

    public function listing () {
        $listings = Listing::with('availabilities.service')->get();

        return view('listing')->with(['listings' => $listings]);
    }

    public function shop ($id) {
        $shop = Listing::find($id);
        $available = Available::where('listing_id', $shop->id)->get();

        return view('shop')->with(['shop' => $shop, 'availables' => $available]);
    }

    public function appointment ($id) {
        $shop = Listing::find($id);
        $available = Available::where('listing_id', $shop->id)->get();
        $schedules = Schedule::where('clinic_id', $shop->id)->get();

        return view('appointment')->with(['shop' => $shop, 'availables' => $available,'schedules' => $schedules]);
    }
}

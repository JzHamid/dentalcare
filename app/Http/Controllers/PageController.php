<?php

namespace App\Http\Controllers;

use App\Models\Service;
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

    public function admin () {
        $services = Service::all();

        return view('admin')->with(['services' => $services]);
    }
}

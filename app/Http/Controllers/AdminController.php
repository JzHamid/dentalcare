<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        $service = Service::where('id', $id)->delete();

        return redirect('/admin')->with(['page' => 3]);
    }

    public function create_listing (Request $request) {
        
    }
}

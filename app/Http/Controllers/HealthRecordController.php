<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use App\Models\User;

class HealthRecordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'record_type' => 'required|string',
            'record_name' => 'required|string|max:255',
            'record_details' => 'nullable|string',
            'record_date' => 'nullable|date',
        ]);

        HealthRecord::create($request->all());

        return back()->with('success', 'Health record added successfully.');
    }

    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $records = $user->healthRecords;

        return view('user.health_records', compact('user', 'records'));
    }
}


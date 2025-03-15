<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        // Total revenue per procedure
        $revenuePerProcedure = DB::table('payments')
            ->join('appointments', 'payments.appointment_id', '=', 'appointments.id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('SUM(payments.amount_paid) as total_revenue'))
            ->groupBy('services.name')
            ->get();

        // Most profitable procedure
        $mostProfitableProcedure = $revenuePerProcedure->sortByDesc('total_revenue')->first();

        // Most profitable procedure of the current month
        $mostProfitableThisMonth = DB::table('payments')
            ->join('appointments', 'payments.appointment_id', '=', 'appointments.id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('SUM(payments.amount_paid) as total_revenue'))
            ->whereMonth('payments.created_at', now()->month)
            ->groupBy('services.name')
            ->orderByDesc('total_revenue')
            ->first();

        // Most booked services
        $mostBookedServices = DB::table('appointments')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('COUNT(appointments.id) as total_bookings'))
            ->groupBy('services.name')
            ->orderByDesc('total_bookings')
            ->get();

        return response()->json([
            'revenuePerProcedure' => $revenuePerProcedure,
            'mostProfitableProcedure' => $mostProfitableProcedure,
            'mostProfitableThisMonth' => $mostProfitableThisMonth,
            'mostBookedServices' => $mostBookedServices,
        ]);
    }
}
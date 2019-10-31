<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TicketsExport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $riderData = DB::table('bike_details')
            ->join('riders', 'bike_details.id', '=', 'riders.id')
            ->join('other_details', 'bike_details.id', '=', 'other_details.id')
            ->join('tickets', 'bike_details.registrationnum', '=', 'tickets.vehicleno')
            ->select(['riders.id', 'riders.phonenumber', 'riders.status', 'riders.lga', 'bike_details.ridername',
                'bike_details.registrationnum', 'other_details.unitparkname', 'other_details.riderid',
                DB::raw("count(tickets.vehicleno) AS ticket_count")])
             ->groupBy('riders.id');
        if (request()->ajax()) {
            return datatables()->of($riderData)
                ->addColumn('action', 'actionhome')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('home');
    }
}
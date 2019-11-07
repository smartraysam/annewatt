<?php

namespace App\Http\Controllers;

use App\Tickets;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Response;

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
    public function home()
    {
        return view('index');
    }
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
        $currentDateTime = Carbon::now()->format('Y-m-d');
        $todayTicket = Tickets::where('collectiondate', $currentDateTime)->count();
        $totalRider = DB::table('riders')->count();
        $sumIncome = DB::table('tickets')->where('tickets.collectiondate', $currentDateTime)->sum('amount');
        return view('admin', compact('todayTicket', 'totalRider', 'sumIncome'));
    }

    public function details($riderid)
    {
        $riderData = DB::table('other_details')->where('other_details.riderid', $riderid)
            ->join('riders', 'other_details.id', '=', 'riders.id')
            ->get();
        $ticketData = DB::table('tickets')->where('tickets.payerID', $riderid)
            ->orderBy('tickets.collectiondate', 'desc')
            ->get();
        $riderDetails = json_encode(['riderData' => $riderData, 'ticketData' => $ticketData]);
        return Response::json($riderDetails);
    }

}
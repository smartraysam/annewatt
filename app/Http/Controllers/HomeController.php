<?php

namespace App\Http\Controllers;

use App\Tickets;
use Artisan;
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

    public function about()
    {
        return view('about');
    }

    public function excos()
    {
        return view('excos');
    }

    public function contact()
    {
        return view('contact');
    }
    public function index()
    {
        $riderData = DB::table('bike_details')
            ->join('riders', 'bike_details.phonenumber', '=', 'riders.phonenumber')
            ->join('other_details', 'bike_details.phonenumber', '=', 'other_details.phonenumber')
            ->join('tickets', 'bike_details.registrationnum', '=', 'tickets.vehicleno')
            ->select(['riders.id', 'riders.phonenumber', 'riders.status', 'riders.lga', 'bike_details.ridername',
                'bike_details.registrationnum as registrationnum ', 'other_details.unitparkname', 'other_details.riderid'])->get();
        foreach ($riderData as $key => $value) {
            # code...
            $riderData["ticket_count"] = Tickets::where('vehicleno', $value->registrationnum)->count();
        }
        if (request()->ajax()) {
            return datatables()->of($riderData)
                ->addColumn('action', 'actionhome')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $currentDateTime = Carbon::now()->format('Y-m-d');
        $todayTicket = Tickets::where('collectiondate', $currentDateTime)->count();
        $totalRider = DB::table('riders')->join('bike_details', 'bike_details.phonenumber', '=', 'riders.phonenumber')->count();
        $sumIncome = DB::table('tickets')->where('tickets.collectiondate', $currentDateTime)->sum('amount');
        return view('admin', compact('todayTicket', 'totalRider', 'sumIncome'));
    }

    public function details($riderid)
    {
        $riderData = DB::table('other_details')->where('other_details.riderid', $riderid)
            ->join('riders', 'other_details.phonenumber', '=', 'riders.phonenumber')
            ->join('bike_details', 'other_details.phonenumber', '=', 'bike_details.phonenumber')
            ->get();
        $ticketData = DB::table('tickets')->where('tickets.payerID', $riderid)
            ->orderBy('tickets.collectiondate', 'desc')
            ->get();
        $riderDetails = json_encode(['riderData' => $riderData, 'ticketData' => $ticketData]);
        return Response::json($riderDetails);
    }

    public function clearapp()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('optimize');
        $clear = 'App Cache Cleared and Optimized';
        $resp = json_encode($clear);
        return Response::json($resp);
    }

}
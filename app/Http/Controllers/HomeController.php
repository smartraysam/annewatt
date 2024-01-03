<?php

namespace App\Http\Controllers;

use App\Riders;
use App\Tickets;
use App\User;
use Artisan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;

class HomeController extends Controller
{
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

    public function privacy()
    {
        return view('privacy');
    }
    public function contact()
    {
        return view('contact');
    }

    public function ChangePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/admin')->with('success', 'Password changed successfully');
    }
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            # code...
            $totalBranch = User::where('role', 'user')->count();
            $totalRider = Riders::join('bike_details', 'bike_details.phonenumber', '=', 'riders.phonenumber')->count();
            return view('admin.index', compact('totalRider', 'totalBranch'));
        } else {
            $riderData = DB::table('bike_details')
                ->join('riders', 'bike_details.phonenumber', '=', 'riders.phonenumber')->where('riders.owner', auth()->user()->id)
                ->join('other_details', 'bike_details.phonenumber', '=', 'other_details.phonenumber')
                ->join('tickets', 'bike_details.registrationnum', '=', 'tickets.vehicleno')
                ->select([
                    'riders.id', 'riders.phonenumber', 'riders.status', 'riders.lga', 'bike_details.ridername',
                    'bike_details.registrationnum as registrationnum ', 'other_details.unitparkname', 'other_details.riderid'
                ])->get();
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
            $todayTicket = Tickets::where('collectiondate', $currentDateTime)->where("owner", auth()->user()->id)->count();
            $totalRider = DB::table('riders')->where("owner", auth()->user()->id)->join('bike_details', 'bike_details.phonenumber', '=', 'riders.phonenumber')->count();
            $sumIncome = DB::table('tickets')->where("owner", auth()->user()->id)->where('tickets.collectiondate', $currentDateTime)->sum('amount');
            return view('dashboard', compact('todayTicket', 'totalRider', 'sumIncome'));
        }
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

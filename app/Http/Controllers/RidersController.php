<?php

namespace App\Http\Controllers;

use App\Riders;
use App\Bike_details;
use App\Tickets;
use App\Other_details;
use App\Nextkin_details;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;

class RidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->session()->forget('rider');
        $riderData = DB::table('riders')
            ->join('bike_details', 'riders.id', '=', 'bike_details.id')
            ->join('other_details', 'riders.id', '=', 'other_details.id')
            ->select(['riders.id', 'riders.phonenumber', 'riders.status', 'riders.lga', 'bike_details.ridername', 'bike_details.registrationnum', 'other_details.unitparkname', 'other_details.riderid']);
        if (request()->ajax()) {
            return datatables()->of($riderData)
                ->addColumn('action', 'actionrider')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('riders.index');
    }
    public function show($id)
    {
        $riderData = DB::table('riders')->where('riders.id', $id)
            ->join('other_details', 'other_details.id', '=', 'riders.id')
            ->join('bike_details', 'bike_details.id', '=', 'riders.id')
            ->get();

        $nextkinData = DB::table('nextkin_details')->where('nextkin_details.id', $id)
            ->get();

        $ticketData = DB::table('bike_details')->where('bike_details.id', $id)
            ->join('tickets', 'bike_details.registrationnum', '=', 'tickets.vehicleno')
            ->orderBy('tickets.collectiondate', 'desc')
            ->get();
        $ticketCount = count($ticketData);
       // $riderDetails = json_encode(['riderData' => $riderData, 'nextkinData' => $nextkinData, 'ticketData' => $ticketData, 'ticketCount' => $ticketCount]);
       // return Response::json($riderDetails);
        return view('riders.riderview', compact('riderData', 'nextkinData','ticketData', 'ticketCount'));
    }

    public function delete($id)
    {
        $rider = Riders::findOrFail($id);
        $rider->delete();
        $bike = Bike_details::findOrFail($id);
        $bike->delete();
        $other = Other_details::findOrFail($id);
        $other->delete();
        $next = Nextkin_details::findOrFail($id);
        $next->delete();
        echo "Record deleted successfully";
    }
    public function createRider(Request $request)
    {
        $rider = $request->session()->get('rider');
        return view('riders.rider', compact('rider', $rider));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRider(Request $request)
    {
        $validatedData = $request->validate([
            'phonenumber' => 'required|numeric|unique:riders',
            'firstname' => 'required',
            'middlename' => 'required',
            'surname' => 'required',
            'status' => 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'martialstatus' => 'required',
            'nationality' => 'required',
            'stateoforigin' => 'required',
            'lga' => 'required',
            'placeofbirth' => 'required',
            'housenumname' => 'nullable',
            'streetname' => 'nullable',
            'villagetown' => 'nullable',
            'parttime_details' => 'nullable',
            'bvn' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'profilepic' => 'nullable',
        ]);

        if (empty($request->session()->get('rider'))) {
            $rider = new Riders();
            $rider->fill($validatedData);
            $cover = $request->file('profilepic');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename() . '.' . $extension, File::get($cover));
            $rider->profilepic = $cover->getFilename() . '.' . $extension;
            $request->session()->put('rider', $rider);
        } else {
            $rider = $request->session()->get('rider');
            $rider->fill($validatedData);
            $request->session()->put('rider', $rider);
        }
        return redirect('/riders/bike');
    }

}
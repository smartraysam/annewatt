<?php

namespace App\Http\Controllers;

use App\Riders;
use App\Bike_details;
use App\local_governments;
use App\Tickets;
use App\Other_details;
use App\Nextkin_details;
use App\states;
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
            ->join('bike_details', 'riders.phonenumber', '=', 'bike_details.phonenumber')
            ->join('other_details', 'riders.phonenumber', '=', 'other_details.phonenumber')
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
        $phonenumber = DB::table('riders')->where('riders.id', $id)->value("phonenumber");
        $riderData = DB::table('riders')->where('riders.phonenumber', $phonenumber)
            ->join('other_details', 'other_details.phonenumber', '=', 'riders.phonenumber')
            ->join('bike_details', 'bike_details.phonenumber', '=', 'riders.phonenumber')
            ->get();

        $nextkinData = DB::table('nextkin_details')->where('nextkin_details.phonenumber', $phonenumber)
            ->get();

        $ticketData = DB::table('bike_details')->where('bike_details.phonenumber', $phonenumber)
            ->join('tickets', 'bike_details.registrationnum', '=', 'tickets.vehicleno')
            ->orderBy('tickets.collectiondate', 'desc')
            ->get();
        $ticketCount = count($ticketData);
        return view('riders.riderview', compact('riderData', 'nextkinData', 'ticketData', 'ticketCount'));
    }

    public function delete($id)
    {
        $rider = Riders::findOrFail($id);
        if(!$rider){
            return redirect('/admin')->with('error', ' Rider not found');
        }
        $bike = Bike_details::where("phonenumber", $rider->phonenumber)->first();
        if ($bike) {
            $bike->delete();
        }
        $other = Other_details::where("phonenumber", $rider->phonenumber)->first();
        if ($other) {
            $other->delete();
        }
        $next = Nextkin_details::where("phonenumber", $rider->phonenumber)->first();
        if ($next) {
            $next->delete();
        }
        $rider->delete();
        return redirect('/admin')->with('success', ' Rider successfully deleted');
    }
    public function createRider(Request $request)
    {
        if (!empty($request->id)) {
            $rider =  Riders::findOrFail($request->id);
            $request->session()->put('rider', $rider);
        } else {
            $rider = $request->session()->get('rider');
        }
        $states = DB::table('states')->get();
        $lgas =  DB::table('local_governments')->get();
        return view('riders.rider', compact('rider', 'states', 'lgas'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRider(Request $request)
    {
        if (empty($request->id)) {
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
            $rider = new Riders();
            $rider->fill($validatedData);
            if ($request->has('profilepic')) {
                $cover = $request->file('profilepic');
                $extension = $cover->getClientOriginalExtension();
                Storage::disk('public')->put($cover->getFilename() . '.' . $extension, File::get($cover));
                $rider->profilepic = $cover->getFilename() . '.' . $extension;
            }
          
            $request->session()->put('rider', $rider);
        } else {
            $rider = $request->session()->get('rider');
            $rider->fill($request->all());
            $request->session()->put('rider', $rider);
            $bike = Bike_details::where("phonenumber",$rider->phonenumber)->first();
            $request->session()->put('bike', $bike);
        }
        return redirect('/riders/bike');
    }
}

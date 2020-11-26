<?php
namespace App\Http\Controllers;

use App\Bike_details;
use Illuminate\Http\Request;

class BikeDetailsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createBike(Request $request)
    {
        $bike = $request->session()->get('bike');
        return view('riders.bike', compact('bike', $bike));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postBike(Request $request)
    {

        $validatedData = $request->validate([
            'bikebrand' => 'required',
            'enginenumber' => 'required',
            'chasisno' => 'required',
            'registrationnum' => 'required',
            'receiptnumber' => 'required',
            'dateofpurchase' => 'required',
            'witnessname' => 'nullable',
            'witnessaddress' => 'nullable',
            'witnessphonenum' => 'nullable|numeric',
        ]);

        if (empty($request->session()->get('bike'))) {
            $bike = new Bike_details();
            $bike->fill($validatedData);
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $bike->ridername = $rider->firstname . ' ' . $rider->middlename . ' ' . $rider->surname;
            $bike->phonenumber = $rider->phonenumber;
            $request->session()->put('bike', $bike);

        } else {
            $bike = $request->session()->get('bike');
            $bike->fill($validatedData);
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $bike->ridername = $rider->firstname . ' ' . $rider->middlename . ' ' . $rider->surname;
            $bike->phonenumber = $rider->phonenumber;
            $request->session()->put('bike', $bike);

        }

        return redirect('/riders/nextkin');
    }

    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/rider');

    }
}
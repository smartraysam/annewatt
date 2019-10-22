<?php
namespace App\Http\Controllers ;
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
        return view('riders.create-bike', compact('bike', $bike));
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
            'enginenumber' => 'required|numeric',
            'chasisno' => 'required|numeric',
            'registrationnum' => 'required|numeric',
            'receiptnumber' => 'required|numeric',
            'dateofpurchase' => 'required',
            'witnessname' => 'required',
            'witnessaddress' => 'required',
            'witnessphonenum' => 'required|numeric',
        ]);

        if (empty($request->session()->get('bike'))) {
            $bike = new Bike_details();
            $bike->fill($validatedData);
            $rider = $request->session()->get('rider');
            $bike->ridername = $rider->firstname . ' ' . $rider->middlename . ' ' . $rider->surname;
            $bike->phonenumber = $rider->phonenumber;
            $request->session()->put('bike', $bike);

        } else {
            $bike = $request->session()->get('bike');
            $bike->fill($validatedData);
            $rider = $request->session()->get('rider');
            $bike->ridername = $rider->firstname . ' ' . $rider->middlename . ' ' . $rider->surname;
            $bike->phonenumber = $rider->phonenumber;
            $request->session()->put('bike', $bike);

        }

        return redirect('/riders/create-nextkin');
    }

    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/create-rider');

    }
}
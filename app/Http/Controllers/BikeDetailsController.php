<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BikeDetailsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function createBike(Request $request)
    {
        $bike = $request->session()->get('bike');
        return view('bike_details.create-bike',compact('bike', $rider));
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
            'phonenumber' => 'required|numeric|unique:riders',
            'ridername' => 'required',
            'bikebrand' => 'required',
            'enginenumber' => 'required',
            'chasisno' => 'required',
            'registrationnum' => 'required',
            'receiptnumber' => 'required',
            'dateofpurchase' => 'required',
           
        ]);

        if(empty($request->session()->get('bike'))){
            $bike = new Riders();
            $bike->fill($validatedData);
            $request->session()->put('bike', $bike);
        }else{
            $bike = $request->session()->get('bike');
            $bike->fill($validatedData);
            $request->session()->put('bike', $bike);
        }

        return redirect('/nextkin_details/create-nextkin');
    }
}

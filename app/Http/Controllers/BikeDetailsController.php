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
        return view('riders.create-bike',compact('bike', $bike));
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
            'phonenumber' => 'required|numeric|unique:bike_details',
            'ridername' => 'required',
            'bikebrand' => 'required',
            'enginenumber' => 'required',
            'chasisno' => 'required',
            'registrationnum' => 'required',
            'receiptnumber' => 'required',
            'dateofpurchase' => 'required',
           
        ]);

        if(empty($request->session()->get('bike'))){
            $bike = new Bike_details();
            $bike->fill($validatedData);
            $request->session()->put('bike', $bike);
        }else{
            $bike = $request->session()->get('bike');
            $bike->fill($validatedData);
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

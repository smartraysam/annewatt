<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RidersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function createRider(Request $request)
    {
        $rider = $request->session()->get('rider');
        return view('riders.create-rider',compact('rider', $rider));
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
            'stateoforgin' => 'required',
            'lga' => 'required',
            'placeofbirth' => 'required',
            'bvn' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);

        if(empty($request->session()->get('rider'))){
            $rider = new Riders();
            $rider->fill($validatedData);
            $request->session()->put('rider', $rider);
        }else{
            $rider = $request->session()->get('rider');
            $rider->fill($validatedData);
            $request->session()->put('rider', $rider);
        }

        return redirect('/bike_details/create-bike');
    }
}

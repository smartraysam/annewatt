<?php

namespace App\Http\Controllers;

use App\Other_details;
use Illuminate\Http\Request;

class OtherDetailsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createOther(Request $request)
    {
        if (!empty($request->id)) {
            $nextkin = Other_details::find($request->id);
            $request->session()->put('nextkin', $nextkin);
        } else {
            $other = $request->session()->get('other');
        }
        return view('riders.other', compact('other', $other));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postOther(Request $request)
    { 
        if (empty($request->id)) {
            $validatedData = $request->validate([
                'unitparkname' => 'required',
                'chairmanname' => 'required',
                'chairmanphoneno' => 'required',
                'riderid' => 'required',
    
            ]);
    
            $other = new Other_details();
            $other->fill($validatedData);
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $other->phonenumber = $rider->phonenumber;
            $request->session()->put('other', $other);
        } else {
            $other = $request->session()->get('other');
            $other->fill($request->all());
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $other->phonenumber = $rider->phonenumber;
            $request->session()->put('other', $other);
        }
        return redirect('/riders/confirmation');
    }

    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/nextkin');
    }
}

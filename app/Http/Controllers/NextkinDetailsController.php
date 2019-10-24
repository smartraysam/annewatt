<?php

namespace App\Http\Controllers;

use App\Nextkin_details;
use Illuminate\Http\Request;

class NextkinDetailsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createNextkin(Request $request)
    {
        $nextkin = $request->session()->get('nextkin');
        return view('riders.create-nextkin', compact('nextkin', $nextkin));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postNextkin(Request $request)
    {

        $validatedData = $request->validate([

            'firstname' => 'required',
            'middlename' => 'required',
            'surname' => 'required',
            'relationship' => 'required',
            'address' => 'required',
            'kinphonenumber' => 'required',
            'title' => 'required',
            'stateoforigin' => 'required',
            'lga' => 'required',
            'gender' => 'required',
            'bvn' => 'nullable',
        ]);

        if (empty($request->session()->get('nextkin'))) {
            $nextkin = new Nextkin_details();
            $nextkin->fill($validatedData);
            $rider = $request->session()->get('rider');
            $nextkin->phonenumber = $rider->phonenumber;
            $request->session()->put('nextkin', $nextkin);
        } else {
            $nextkin = $request->session()->get('nextkin');
            $nextkin->fill($validatedData);
            $rider = $request->session()->get('rider');
            $nextkin->phonenumber = $rider->phonenumber;
            $request->session()->put('nextkin', $nextkin);
        }

        return redirect('/riders/create-other');
    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/create-bike');

    }
}
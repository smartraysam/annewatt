<?php

namespace App\Http\Controllers;

use App\Riders;
use Illuminate\Http\Request;

class RidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->session()->forget('rider');
        $rider = Riders::all();
        return view('riders.index', compact('rider', $rider));
    }
    public function createRider(Request $request)
    {
        $rider = $request->session()->get('rider');
        return view('riders.create-rider', compact('rider', $rider));
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
            'phonenumber' => 'required|numeric',
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
            'bvn' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if (empty($request->session()->get('rider'))) {
            $rider = new Riders();
            $rider->fill($validatedData);
            if (!isset($rider->profilePic)) {
                $fileName = "profilepic-" . time() . '.' . request()->profilepic->getClientOriginalExtension();
                $request->profilepic->storeAs('profilepic', $fileName);
                $rider->profilePic = $fileName;
            }
            $request->session()->put('rider', $rider);
        } else {
            $rider = $request->session()->get('rider');
            $rider->fill($validatedData);
            $request->session()->put('rider', $rider);
        }

        return redirect('/riders/create-bike');
    }
    public function postRiderimage(Request $request)
    {
        $rider = $request->session()->get('rider');
        if (!isset($rider->profilePic)) {
            $request->validate([
                'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileName = "profilepic-" . time() . '.' . request()->profilepic->getClientOriginalExtension();

            $request->profilepic->storeAs('profilepic', $fileName);

            $rider = $request->session()->get('rider');

            $rider->profilePic = $fileName;
            $request->session()->put('rider', $rider);
        }
        return redirect('/riders/create-rider');
    }

    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function removeImage(Request $request)
    {
        $rider = $request->session()->get('rider');
        $rider->profilePic = null;
        return view('riders.create-rider', compact('rider', $rider));
    }
}
<?php

namespace App\Http\Controllers;

use App\Riders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            'bvn' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'profilepic' => 'required',
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
<?php

namespace App\Http\Controllers;

use App\Nextkin_details;
use App\Other_details;
use DB;
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
        if (!empty($request->id)) {
            $nextkin=Nextkin_details::find($request->id); 
            $request->session()->put('nextkin', $nextkin);
        } else {
            $nextkin = $request->session()->get('nextkin');
        }
        $states = DB::table('states')->get();
        $lgas =  DB::table('local_governments')->get();
        return view('riders.nextkin', compact('nextkin',"states","lgas"));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postNextkin(Request $request)
    {

       

        if (empty($request->id)) {
            $validatedData = $request->validate([

                'firstname' => 'required',
                'middlename' => 'required',
                'surname' => 'required',
                'relationship' => 'required',
                'address' => 'required',
                'housenumname' => 'nullable',
                'streetname' => 'nullable',
                'villagetown' => 'nullable',
                'kinphonenumber' => 'required',
                'title' => 'required',
                'stateoforigin' => 'required',
                'lga' => 'required',
                'gender' => 'required',
                'bvn' => 'nullable',
            ]);
            $nextkin = new Nextkin_details();
            $nextkin->fill($validatedData);
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $nextkin->phonenumber = $rider->phonenumber;
            $request->session()->put('nextkin', $nextkin);
        } else {
            $nextkin = $request->session()->get('nextkin');
            $nextkin->fill($request->all());
            $rider = $request->session()->get('rider');
            if (empty($rider)) {
                return redirect('/riders/bike')->with('error', 'Rider infromation is missing');
            }
            $nextkin->phonenumber = $rider->phonenumber;
            $request->session()->put('nextkin', $nextkin);

            $other = Other_details::where("phonenumber",$nextkin->phonenumber)->first();
            $request->session()->put('other', $other);
        }

        return redirect('/riders/other');
    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/bike');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherDetailsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function createOther(Request $request)
    {
        $other = $request->session()->get('other');
        return view('riders.create-other',compact('other', $other));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postOther(Request $request)
    {

        $validatedData = $request->validate([
            'unitparkname' => 'required',
           
        ]);

        if(empty($request->session()->get('other'))){
            $other = new Other_details();
            $other->fill($validatedData);
            $request->session()->put('other', $other);
        }else{
            $other = $request->session()->get('other');
            $other->fill($validatedData);
            $request->session()->put('other', $other);
        }

        return redirect('/riders/confirmation');
    }

    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/create-nextkin');

    }
}

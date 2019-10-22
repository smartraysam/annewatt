<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderPreviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function preview(Request $request)
    {
        //validate the form
        $riderInfo = $request->session()->all();

        return view('riders.confirmation', compact('riderinfo', $riderInfo));

    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/create-other');

    }

    public function submit(Request $request)
    {
        //validate the form
        $rider = $request->session()->get('rider');
        $bike = $request->session()->get('bike');
        $nextkin = $request->session()->get('nextkin');
        $other = $request->session()->get('other');
        $rider->save();
        $bike->save();
        $nextkin->save();
        $other->save();
        $request->session()->forget('rider');
        $request->session()->forget('bike');
        $request->session()->forget('nextkin');
        $request->session()->forget('other');
        return redirect('/home');
    }
}

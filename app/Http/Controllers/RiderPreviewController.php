<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
   public function __construct(){
    $this->middleware('auth');
    }

    public function confirmation(Request $request)
    {
        //validate the form
        $rider = $request->session()->get('rider');
        $bike = $request->session()->get('bike');
        $nextkin = $request->session()->get('nextkin');
        $other = $request->session()->get('other');
        $riderInfo =$request->session() ->all();

        return view('riders.confirmation',$riderInfo);
        
    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/other_details/create-other');

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
        $request->session()->flush();
        return redirect('/home');
    }
}

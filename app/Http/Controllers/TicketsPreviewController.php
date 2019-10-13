<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsPreviewController extends Controller
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
        $ticket = $request->session()->get('ticket');
        return view('tickets.confirmation',compact('ticket',$ticket));

    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/tickets/create-ticket');

    }

    public function submit(Request $request)
    {
        //validate the form
        return redirect('/home');

    }
}

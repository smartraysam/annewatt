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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function preview(Request $request)
    {
        //validate the form
        $ticket = $request->session()->get('ticket');
        return view('tickets.confirmation', compact('ticket', $ticket));

    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/tickets/ticket');

    }
    public function cancel(Request $request)
    {
        //validate the form
        $request->session()->forget('ticket');
        return redirect('/tickets/ticket');

    }

    public function store(Request $request)
    {
        //validate the form
        $ticket = $request->session()->get('ticket');
        $ticket->save();
        $request->session()->forget('ticket');
        return redirect('/home')->with('success', 'Ticket entry is successfully saved');

    }
}
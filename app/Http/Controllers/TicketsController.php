<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->session()->forget('ticket');
        $ticket = Tickets::all();
        return view('tickets.index',compact('ticket',$ticket));
    }
    public function createTicket(Request $request)
    {
        $ticket = $request->session()->get('ticket');
        return view('tickets.create-ticket',compact('ticket', $ticket));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTicket(Request $request)
    {

        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'vehicleno' => 'required',
            'transID' => 'required',
            'collectorname' => 'required',
            'collectionlga' => 'required',
        ]);

        if(empty($request->session()->get('ticket'))){
            $ticket = new Tickets();
            $ticket->fill($validatedData);
            $request->session()->put('ticket', $ticket);
        }else{
            $ticket = $request->session()->get('ticket');
            $ticket->fill($validatedData);
            $request->session()->put('ticket', $ticket);
        }

        return redirect('/tickets/confirmation');
    }
}

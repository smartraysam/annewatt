<?php

namespace App\Http\Controllers;

use App\Tickets;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Response;

class TicketsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->session()->forget('ticket');
        $tickets = DB::table('tickets')->get();
        return view('tickets.index', compact('tickets',$tickets));
    }
    public function createTicket(Request $request)
    {
        $ticket = $request->session()->get('ticket');
        return view('tickets.ticket', compact('ticket', $ticket));
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
            'transID' => 'required|numeric',
            'collectorname' => 'required',
            'collectionlga' => 'required',
            'collectiondate' => 'nullable',
            'payername' => 'nullable',
            'payerID' => 'nullable',
            'payerphone' => 'nullable',
            'payerlga' => 'nullable',

        ]);

        if (empty($request->session()->get('ticket'))) {
            $ticket = new Tickets();
            $ticket->fill($validatedData);
            $request->session()->put('ticket', $ticket);
        } else {
            $ticket = $request->session()->get('ticket');
            $ticket->fill($validatedData);
            $request->session()->put('ticket', $ticket);
        }

        return redirect('/tickets/confirmation');
    }
}
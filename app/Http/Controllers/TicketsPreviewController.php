<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike_details;
use App\Tickets;

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
        $bikedetail = Bike_details::where('bike_details.registrationnum',  $ticket->vehicleno)->first();
        
        $ticketdetail = Tickets::where('tickets.transID',  $ticket->transID)->first();

        if($ticketdetail){
            return redirect('/tickets/ticket')->with('error', 'Transaction ID already exist, Please confirm the ticket transaction number');
        }
        if(!$bikedetail){
            return redirect('/tickets/ticket')->with('error', 'Rider does not exist, Please confirm the vehicle number');
        }else{
            $ticket->save();
            $request->session()->forget('ticket');
        }
        return redirect('/admin')->with('success', 'Ticket entry is successfully saved');

    }
}
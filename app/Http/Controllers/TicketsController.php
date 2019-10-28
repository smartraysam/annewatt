<?php

namespace App\Http\Controllers;

use App\Tickets;
use Illuminate\Http\Request;
use Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TicketsExport;


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
        if (request()->ajax()) {
            return datatables()->of(Tickets::select('*'))
                ->addColumn('action', 'action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('tickets.index');
    }

    public function show($id)
    {
        $where = array('id' => $id);
        $ticket = Tickets::where($where)->get();
        return Response::json($ticket);
    }
    public function exportExcel()
    {
      return Excel::download(new TicketsExport, 'tickets.xlsx');
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
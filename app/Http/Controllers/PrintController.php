<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public function printpreview($id)
    {
        $where = array('id' => $id);
        $ticket = Tickets::where($where)->get();
        return Response::json($ticket);
    }
}
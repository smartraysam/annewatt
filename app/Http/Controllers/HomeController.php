<?php

namespace App\Http\Controllers;
use App\Riders;
use DB;
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
    public function index()
    {
        $riders = DB::table('riders')->get();
        return view('home', compact('riders', $riders));
    }
}
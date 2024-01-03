<?php

namespace App\Http\Controllers;

use App\Riders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function registerBranch(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenumber' => 'required',
            'address' => 'required',
            'lga' => 'required',
            'branch' => 'required',
        ]);
        $user = new User();
        $user->password =  Hash::make($request->phonenumber);
        $user->role = "user";
        $user->fill($validatedData);
        $user->save();
        return redirect('/admin')->with('success', 'New account created successfully. Account password:'.$request->phonenumber);
    }

    public function getBranches()
    {
        $users = User::where('role', 'user')->get();
        foreach ($users as $user) {
            $user->riders = Riders::where("owner", $user->id)->join('bike_details', 'bike_details.phonenumber', '=', 'riders.phonenumber')->count();
        }
        if (request()->ajax()) {
            return DataTables::of($users)
                ->addColumn('action', 'actionrider')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Bike_details;
use App\Other_details;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RiderPreviewController extends Controller
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
        $rider = $request->session()->get('rider');
        $bike = $request->session()->get('bike');
        $nextkin = $request->session()->get('nextkin');
        $other = $request->session()->get('other');
        $riderInfo = array("rider", "bike", "nextkin", "other");

        return view('riders.confirmation', compact('riderInfo', $riderInfo));

    }
    public function back(Request $request)
    {
        //validate the form
        return redirect('/riders/other');

    }
    public function cancel(Request $request)
    {
        //validate the form
        $request->session()->forget('rider');
        $request->session()->forget('bike');
        $request->session()->forget('nextkin');
        $request->session()->forget('other');
        return redirect('/admin');

    }
    public function sendCtrlSMS($phoneNumber, $message)
    {
        $client = new Client();

        $method = 'POST';
        $url = "https://termii.com/api/sms/send?to=234" . $phoneNumber . "&from=Annewatt&sms=" . $message . "&type=plain&channel=generic&api_key=TLU204igSqZRUDDzHYgdsj7693rvcCFo3Ps3RkPxYbi9kyjXs7uYANxVTR9SBs";

        \Log::info($url);
        $request = $client->request($method, $url)->getBody();
        $response = $request->getContents();
        \Log::info($response);
        return $response;
    }
    public function submit(Request $request)
    {
        //validate the form
        $rider = $request->session()->get('rider');
        $bike = $request->session()->get('bike');
        $nextkin = $request->session()->get('nextkin');
        $other = $request->session()->get('other');
        $bikedetail = Bike_details::where('bike_details.registrationnum', $bike->registrationnum)->first();
        $otherdetail = Other_details::where('other_details.riderid', $other->riderid)->first();
        if ($bikedetail || $otherdetail) {
            return redirect('/riders/bike')->with('error', 'Rider already exist, Please confirm the vehicle reg. number and the rider ID.');
        } else {
            $rider->save();
            $bike->save();
            $nextkin->save();
            $other->save();
            $request->session()->forget('rider');
            $request->session()->forget('bike');
            $request->session()->forget('nextkin');
            $request->session()->forget('other');
        }
        $phoneNumber = $rider->phonenumber;
        $message = "Your bike registration is complete. View your details on https://www.annewatt.com using Your Rider ID " . $other->riderid;
        $this->sendCtrlSMS($phoneNumber, $message);
        return redirect('/admin')->with('success', 'New Rider successfully saved');
    }
}
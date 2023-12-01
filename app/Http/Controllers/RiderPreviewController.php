<?php

namespace App\Http\Controllers;

use App\Bike_details;
use App\Nextkin_details;
use App\Other_details;
use App\Riders;
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
        $url = "https://termii.com/api/sms/send?to=234" . $phoneNumber . "&from=Annewatt&sms=" . $message . "&type=plain&channel=generic&api_key=".config('app.sms');
        $request = $client->request($method, $url)->getBody();
        $response = $request->getContents();
        return $response;
    }
    public function submit(Request $request)
    {
        try {
            //code...
            $rider = $request->session()->get('rider');
            $bike = $request->session()->get('bike');
            $nextkin = $request->session()->get('nextkin');
            $other = $request->session()->get('other');
            if (!empty($rider->id) && !empty($bike->id) && !empty($nextkin->id) && !empty($other->id)) {
                $riderupdate=Riders::find($rider->id);
                $bikeupdate=Bike_details::find($bike->id);
                $nextkinupdate=Nextkin_details::find($nextkin->id);
                $otherupdate=Other_details::find($other->id);
                $riderupdate->update([
                    'firstname' => $rider->firstname,
                    'middlename' => $rider->middlename,
                    'surname' => $rider->surname,
                    'status' => $rider->status,
                    'nickname' => $rider->nickname,
                    'gender' => $rider->gender,
                    'martialstatus' => $rider->martialstatus,
                    'nationality' => $rider->nationality,
                    'stateoforigin' => $rider->stateoforigin,
                    'lga' => $rider->lga,
                    'placeofbirth' => $rider->placeofbirth,
                    'bvn' => $rider->bvn,
                    'dob' => $rider->dob,
                    'address' => $rider->address,
                    'housenumname' => $rider->housenumname,
                    'streetname' => $rider->streetname,
                    'villagetown' => $rider->villagetown,
                    'parttime_details' => $rider->parttime_details
                ]);
                
                $bikeupdate->update([
                    'ridername' => $bike->ridername,
                    'bikebrand' => $bike->bikebrand,
                    'enginenumber' => $bike->enginenumber,
                    'chasisno' => $bike->chasisno,
                    'registrationnum' => $bike->registrationnum,
                    'receiptnumber' => $bike->receiptnumber,
                    'dateofpurchase' => $bike->dateofpurchase,
                    'witnessname' => $bike->witnessname,
                    'witnessaddress' => $bike->witnessaddress,
                    'witnessphonenum' => $bike->witnessphonenum,
                ]);
                
                $nextkinupdate->update([
                    'kinphonenumber' => $nextkin->kinphonenumber,
                    'phonenumber' => $nextkin->phonenumber,
                    'title' => $nextkin->title,
                    'firstname' => $nextkin->firstname,
                    'middlename' => $nextkin->middlename,
                    'surname' => $nextkin->surname,
                    'relationship' => $nextkin->relationship,
                    'address' => $nextkin->address,
                    'housenumname' => $nextkin->housenumname,
                    'streetname' => $nextkin->streetname,
                    'villagetown' => $nextkin->villagetown,
                    'stateoforigin' => $nextkin->stateoforigin,
                    'lga' => $nextkin->lga,
                    'gender' => $nextkin->gender,
                    'bvn' => $nextkin->bvn,
                ]);
                
                $otherupdate->update([
                    'unitparkname' => $other->unitparkname,
                    'chairmanname' => $other->chairmanname,
                    'chairmanphoneno' => $other->chairmanphoneno,
                    'riderid' => $other->riderid,
                ]);
                 
                $request->session()->forget('rider');
                $request->session()->forget('bike');
                $request->session()->forget('nextkin');
                $request->session()->forget('other');
                return redirect('/riders')->with('success', 'Rider details successfully updated');
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
            // $this->sendCtrlSMS($phoneNumber, $message);
            return redirect('/riders')->with('success', 'New Rider successfully saved');
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info($th);
            return redirect('/riders')->with('error', 'Error saving rider details');
            
        }
       
    }
}

<?php

namespace App\Http\Controllers;

use App\messages;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Response;

class messageController extends Controller
{

    public function saveMessage(Request $request)
    {
        $messages = new messages();

        $messages->name = request('name');
        $messages->email = request('email');
        $messages->subject = request('subject');
        $messages->message = request('message');
        $messages->read_status = "Unread";
        $messages->save();
        return redirect('/')->with('success', 'Your message has been sent. Thank you!');
    }

    public function viewMessages()
    {
        $messages = DB::table('messages')
            ->get();
        if (request()->ajax()) {
            return datatables()->of($messages)
                ->addColumn('action', 'actionmsg')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        // return Response::json($messages);
        return view('inbox');
    }

    public function getUnreadMSG()
    {
        $msg = messages::where('read_status', "Unread")->count();
        return $msg;
    }

    public function readMSG($id)
    {
        $where = array('id' => $id);
        $msg = messages::where($where)->get();
        DB::table('messages')
            ->where('id', $id)
            ->update(['read_status' => "Read"]);
        return Response::json($msg);
    }
    public function sendmsg(Request $request)
    {

        $type = $request->group;
        $message = $request->message;

        if ($type == "general") {
            $rider = DB::table('riders')->select(["phonenumber"])
                ->get();
            $phoneNumber = array();
            foreach ($rider as $key => $value) {
                $number = $value->phonenumber;
                if (Str::contains($number, '+')) {
                    $number = str_replace('+', '', $number);
                }
                if (Str::contains($number, '234')) {
                    $number = str_replace('234', '', $number);
                }
                $this->sendCtrlSMS($phoneNumber, $message);
            }

            // $this->sendMultiple($phoneNumber, $message);

        } else {
            $phoneNumber = $request->phone;
            $resp = $this->sendCtrlSMS($phoneNumber, $message);
        }
        return redirect('/inbox/compose')->with('success', 'Message sent');
    }
    public function compose()
    {
        return view('compose');
    }

    public function deleteMSG($id)
    {
        $msg = messages::findOrFail($id);
        $msg->delete();
        echo "Record deleted successfully";
    }

    public function sendCtrlSMS($phoneNumber, $message)
    {
        $client = new Client();

        $method = 'POST';
        $url = "https://termii.com/api/sms/send?to=234" . $phoneNumber . "&from=Annewatt&sms=" . $message . "&type=plain&channel=generic&api_key=TLU204igSqZRUDDzHYgdsj7693rvcCFo3Ps3RkPxYbi9kyjXs7uYANxVTR9SBs";
        $request = $client->request($method, $url)->getBody();
        $response = $request->getContents();
        \Log::info($response);
        return $response;
    }

    public function sendMultiple($numbers, $message)
    {
        $curl = curl_init();
        $data = array("to" => $numbers, "from" => "Annewatt",
            "sms" => $message, "type" => "plain", "channel" => "generic", "api_key" => "TLU204igSqZRUDDzHYgdsj7693rvcCFo3Ps3RkPxYbi9kyjXs7uYANxVTR9SBs");

        $post_data = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://termii.com/api/sms/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    //
}
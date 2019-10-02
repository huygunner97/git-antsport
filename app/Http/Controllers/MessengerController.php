<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessengerController extends Controller
{

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function index($id)
    {
        $room_id = Message::OrderBy('id','desc')->get('room_id')->unique('room_id')->values()->all();
        $users = User::where('level', 0)->get();
        $user_latest = [];
        $message_latest = [];
        $n = 0;
        foreach($room_id as $ri) {
            foreach($users as  $user) {
                if ($user->id == $ri->room_id) {
                    $user_latest[$n] = $user;
                    $message_latest[$n] = Message::OrderBy('id', 'desc')->where('room_id', $user->id)->first();
                }
            }
            $n++;
        }

        $user = User::where('id', $id)->with('information')->first();
        $data = json_decode($user, true);
        $data['updated_at'] = $user->updated_at->diffForHumans();

        $data = json_encode($data);


        if (Notification::where('user_id', $id)->first()) {
            $this->updateNotification($id);
        }

        $array = [
            'n' => $n,
            'user_latest' => $user_latest,
            'message_latest' => $message_latest,
            'user' => $user,
            'data' => $data,
        ];

        return view('messenger.content', $array);

    }

    public function fetchMessages($id) {
        $messages = Message::where('room_id', $id)->with('user.information')->get();
        
        $data = json_decode($messages, true);

        foreach ($messages as $key => $message) {
            $data[$key]['created_at'] = $message->created_at->diffForHumans();
        }

        $messages = json_encode($data);

        return $messages;
    }
    
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return
     */
    public function sendMessage(Request $request, $id)
    {

        $message = new Message;
        $message->user_id = 1;
        $message->room_id = $id;
        $message->message = $request->input('message');
        $message->save();

        $message->user->information;

        $data = json_decode($message, true);

        $data['created_at'] = $message->created_at->diffForHumans();
        
        broadcast(new MessageSent($data))->toOthers();

        $this->notification($id);

        return $message->id;
    }

    /**
     * Auto send first message
     *
     */
    public function sendFirstMessage(Request $request, $id)
    {
        if (!Message::where('room_id', $id)->first()) {

            $message = new Message;
            $message->user_id = 1;
            $message->room_id = $id;
            $message->message = 'Hello, can i help you ?';
            $message->save();

            $message->user->information;

            $data = json_decode($message, true);

            $data['created_at'] = $message->created_at->diffForHumans();

            broadcast(new MessageSent($data));

            return ['status' => 'Send Message!'];
        } else {
            return ['status' => 'Not need send Message!'];
        }

    }

    /**
     * Persist notification to database
     *
     */
    public function notification($id)
    {
        if (!Notification::where('user_id', $id)->first()) {
            $notification = new Notification;
            $notification->user_id = $id;
            $notification->count_noti_client = 1;
            $notification->save();
        } else {
            $noti = Notification::where('user_id', $id)->first('count_noti_client');
            $noti = $noti->count_noti_client + 1;
            Notification::where('user_id', $id)->update([
                'count_noti_client' => $noti,
            ]);
        }
        return ['status' => 'Added Notification!'];
    }

    public function updateNotification($id)
    {
        Notification::where('user_id', $id)->update([
            'count_noti' => 0,
        ]);

        return ['status' => 'Updated Notification!'];
    }

    /**
     * delete message
     */
    public function deleteMessage($id)
    {
        Message::where('id', $id)->delete();
        return ['status' => 'deleted Notification!'];
    }

}


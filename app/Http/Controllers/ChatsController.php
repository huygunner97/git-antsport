<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatsController extends Controller
{

    /**
     * Fetch all messages
     *
     */
    public function fetchMessages()
    {
        $messages = Message::where('room_id', Auth::id())->with('user.information')->get();
        
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
     * @return $message
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = new Message;
        $message->user_id = Auth::id();
        $message->room_id = Auth::id();
        $message->message = $request->input('message');
        $message->save();

        $message->user->information;

        $data = json_decode($message, true);

        $data['created_at'] = $message->created_at->diffForHumans();

        broadcast(new MessageSent($data))->toOthers();

        $this->notification(Auth::id());

        return $message->id;
    }

    public function notification($id)
    {
        if (!Notification::where('user_id', $id)->first()) {
            $notification = new Notification;
            $notification->user_id = $id;
            $notification->count_noti = 1;
            $notification->save();
        } else {
            $noti = Notification::where('user_id', $id)->first('count_noti');
            $noti = $noti->count_noti + 1;
            Notification::where('user_id', $id)->update([
                'count_noti' => $noti,
            ]);
        }
        return ['status' => 'Added Notification!'];
    }

    public function updateNotification($id)
    {
        Notification::where('user_id', $id)->update([
            'count_noti_client' => 0,
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

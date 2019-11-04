<?php

namespace App\Http\Controllers;

use App\User;
use App\PrivateMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivateMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createNewMessage()
    {
        if (Auth::user()->can('communication_private')) {
            // get only users with role communication_private /////////////////////////////////////////////////////////////
            return view('private_message.createMessage', [
                'users' => User::where('id', '!=', Auth::id())->where('branch_id', Auth::user()->branch_id)->get()
            ]);
        } else {
            abort(403);
        }
    }


    public function sendNewMessage(Request $request)
    {
        if (Auth::user()->can('communication_private')) {
            $request->validate([
                'receiver' => 'required',
                'message' => 'required'
            ]);
            $pm = new PrivateMessage;
            $pm->sender_id = Auth::id();
            $pm->receiver_id = $request->receiver;
            $pm->message_body = $request->message;
            if ($request->hasFile('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads/private_message', $file_name);
                $pm->file = 'uploads/private_message/' . $file_name;
            }
            $pm->save();
            return redirect()->back()->with('success', 'Message sent successfully');
        } else {
            abort(403);
        }
    }


    public function sentMessages()
    {
        if (Auth::user()->can('communication_private')){
            $sentItems = PrivateMessage::where('sender_id', Auth::id())->where('sent_item_delete', 0)->latest()->get();
            $sentMessages = [];
            foreach ($sentItems as $key => $value) {
                $sentMessages[$key]['id'] = $value->id;
                $sentMessages[$key]['receiver'] = User::find($value->receiver_id)->name;
                $sentMessages[$key]['msg'] = $value->message_body;
                $sentMessages[$key]['status'] = $value->status;
                $sentMessages[$key]['date'] = $value->created_at;
                $sentMessages[$key]['seenTime'] = $value->updated_at;
            }
            return view('private_message.sentMessages', compact('sentMessages'));
        } else {
            abort(403);
        }
    }


    public function sentMessageShow($mid)
    {
        if (Auth::user()->can('communication_private')){
            $message = PrivateMessage::find($mid);
            $sender = User::find($message->receiver_id)->name;
            $sender_id = $message->sender_id;
            $msg = $message->message_body;
            $file = ($message->file) ?? '';
            $created_at = $message->created_at;
            return view('private_message.sentMessageShow', compact('mid', 'sender', 'sender_id', 'msg', 'file', 'created_at'));
        } else {
            abort(403);
        }
    }


    public function deleteSentMessage($mid)
    {
        if (Auth::user()->can('communication_private')){
            $pm = PrivateMessage::find($mid);
            if ($pm->inbox_item_delete == 1) {
                if ($pm->file) {
                    unlink($pm->file);
                }
                $pm->delete();
            } else {
                $pm->sent_item_delete = 1;
                $pm->save();
            }
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function downloadMessageFile($mid)
    {
        if (Auth::user()->can('communication_private')){
            $m = PrivateMessage::find($mid);
            $ext = pathinfo($m->file, PATHINFO_EXTENSION);
            $name = 'message_' . md5(time()) . '.' . $ext;
            return response()->download($m->file, $name);
        } else {
            abort(403);
        }
    }


    public function inbox()
    {
        if (Auth::user()->can('communication_private')) {
            $messages = PrivateMessage::where('receiver_id', Auth::id())->where('inbox_item_delete', 0)->latest()->get();
            $inboxMessages = [];
            foreach ($messages as $key => $value) {
                $inboxMessages[$key]['id'] = $value->id;
                $inboxMessages[$key]['sender'] = User::find($value->sender_id)->name;
                $inboxMessages[$key]['msg'] = $value->message_body;
                $inboxMessages[$key]['created_at'] = $value->created_at;
                $inboxMessages[$key]['file'] = $value->file;
            }
            return view('private_message.inboxMessages', compact('inboxMessages'));
        } else {
            abort(403);
        }
    }


    public function messageShow($mid)
    {
        if (Auth::user()->can('communication_private')) {
            $message = PrivateMessage::find($mid)->where('inbox_item_delete', 0)->first();
            if ($message) {
                $message->status = 'seen';
                $message->save();
            }
            $sender = User::find($message->sender_id)->name;
            $sender_id = $message->sender_id;
            $msg = $message->message_body;
            $file = ($message->file) ?? '';
            $created_at = $message->created_at;
            return view('private_message.messageShow', compact('mid', 'sender', 'sender_id', 'msg', 'file', 'created_at'));
        } else {
            abort(403);
        }
    }


    public function messageReply(Request $request)
    {
        if (Auth::user()->can('communication_private')) {
            $request->validate([
                'message' => 'required'
            ]);
            $pm = new PrivateMessage;
            $pm->sender_id = Auth::id();
            $pm->receiver_id = $request->receiver;
            $pm->message_body = $request->message;
            if ($request->hasFile('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads/private_message', $file_name);
                $pm->file = 'uploads/private_message/' . $file_name;
            }
            $pm->save();
            return redirect()->back()->with('success', 'Message sent successfully');
        } else {
            abort(403);
        }
    }



    public function deleteInboxMessage($mid)
    {
        if (Auth::user()->can('communication_private')) {
            $this->deleteMessage($mid);
            return redirect()->back();
        } else {
            abort(403);
        }
    }

    public function deleteInboxShowMessage($mid)
    {
        if (Auth::user()->can('communication_private')) {
            $this->deleteMessage($mid);
            return redirect()->route('message.inbox');
        } else {
            abort(403);
        }
    }

    private function deleteMessage($mid)
    {
        $pm = PrivateMessage::find($mid);
        if ($pm->sent_item_delete == 1) {
            if ($pm->file) {
                unlink($pm->file);
            }
            $pm->delete();
        } else {
            $pm->inbox_item_delete = 1;
            $pm->save();
        }
    }

}
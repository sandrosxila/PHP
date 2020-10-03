<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->orderByDesc('created_at')
            ->notDeleted()->get();
        return view('home')->with('messages', $messages);
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('create')->with('users', $users);
    }

    public function reply(Request $request, $id)
    {
        $message = Message::with('userFrom')->find($id);
        $user = $message->userFrom;
        $subject = $message->subject;
        return view('create')->with(['users' => [$user], 'reply' => true, 'subject' => $subject]);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'to' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('message');
        $message->read = 0;
        $message->deleted = 0;
        $message->save();

        return redirect()->to('/home')->with('success', 'Message Sent Successfully!!');
    }

    public function sent()
    {
        $messages = Message::with('userTo')->where('user_id_from', Auth::id())->
        orderByDesc('created_at')->get();
        return view('sent')->with('messages', $messages);
    }

    public function read($id)
    {
        $message = Message::with('userFrom')->find($id);
        $message->read = 1;
        $message->save();
        return view('read')->with('message', $message);
    }

    public function show($id)
    {
        $message = Message::with('userTo')->find($id);
        return view('show')->with('message', $message);
    }

    public function trash()
    {
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->orderByDesc('created_at')
            ->deleted()->get();
        return view('trash')->with('messages', $messages);
    }

    public function delete($id)
    {
        $message = Message::find($id);
        $message->deleted = 1;
        $message->save();
        return redirect('/home');
    }

    public function restore($id)
    {
        $message = Message::find($id);
        $message->deleted = 0;
        $message->save();
        return redirect('/home');
    }
}

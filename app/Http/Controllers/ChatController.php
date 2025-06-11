<?php

namespace App\Http\Controllers;

use App\Events\ReciveMessage;
use App\Events\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $response['userId'] = Auth::id();
        $response['userName'] = Auth::user()->name_with_initials;
        $response['userEmail'] = Auth::user()->email;
        return view('pages.chat')->with($response);
    }

    public function sendMessage(Request $request)
    {
        $message = $request->message;
        $userId = Auth::id();
        $data = [
            'user_id' => $userId,
            'content' => $message,
            'isBot' => false,
        ];
        event(new SendMessage($data));
        return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
    }

    public function reciveMessage(Request $request)
    {
        // dd($request->all());
        event(new ReciveMessage($request->all()));

        // return 'Event broadcasted!';
    }
}

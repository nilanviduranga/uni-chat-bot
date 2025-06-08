<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $response['userId'] = Auth::id();
        return view('chat')->with($response);
    }
    public function sendMessage(Request $request)
    {

        // Logic to handle sending a message
        // This is just a placeholder; actual implementation will depend on your chat system
        $message = $request->input('message');
        $userId = Auth::id();
        dd($message, $userId);

        // Here you would typically save the message to the database or send it to a service

        return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
    }

    // public function reciveMessage(Request $request)
    // {
    //     // dd($request->all());
    //     event(new MyEvent('hello world'));
    //     // return 'Event broadcasted!';
    // }
}

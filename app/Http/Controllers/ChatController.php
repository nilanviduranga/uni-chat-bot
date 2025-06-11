<?php

namespace App\Http\Controllers;

use App\Events\ReciveMessage;
use App\Events\SendMessage;
use App\Models\chatSession;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $baseUrl   = config('services.bot_api.base_url');
        $user      = Auth::user();                       // authenticate once, then reuse
        $message   = $request->input('message');
        $sessionId = $request->input('sessionId');       // may be null / empty

        if (!$user || !$message) {
            abort(400, 'User not found or message missing');
        }

        event(new SendMessage([
            'user_id' => $user->id,
            'message' => $message,
            'isBot'   => false,
        ]));

        $session = null;

        if ($sessionId) {
            $session = ChatSession::where('user_id', $user->id)
                ->where('session_id', $sessionId)
                ->first();
        }

        if (!$session) {
            $latestSession = ChatSession::where('user_id', $user->id)
                ->latest()
                ->first();

            // —Derive the *next* integer prefix
            $nextIndex = $latestSession
                ? ((int) explode('.', $latestSession->session_id)[0] + 1)
                : 0;

            // —Final session id looks like “N.{userId}”, e.g. “3.17”
            $sessionId = "{$nextIndex}.{$user->id}";

            // —Persist the new session
            $session = ChatSession::create([
                'user_id'    => $user->id,
                'session_id' => $sessionId,
            ]);
        }

        $payload = [
            'message'    => $message,
            'user_id'    => (string) $user->id,
            'session_id' => (string) $sessionId,
        ];

        // $response = Http::withToken('Bearer poc-key-123')
        //     ->acceptJson()
        //     ->post("{$baseUrl}/api/v1/chat", $payload);



        $responseMessage = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer poc-key-123'
        ])->post($baseUrl . '/api/v1/chat', $payload);


        $this->setResponse($responseMessage->json());

        return response()->json(['status' => 'ok']);
    }




    public function reciveMessage(Request $request)
    {
        event(new ReciveMessage($request->all()));
    }
    public function setResponse($responseData)
    {
        $userId = Auth::id();
        $data = [
            'user_id' => $userId,
            'message' => $responseData['response'] ?? '',
            'isBot' => true,
        ];
        event(new ReciveMessage($data));
    }
}

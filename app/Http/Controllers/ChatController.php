<?php

namespace App\Http\Controllers;

use App\Events\ReciveMessage;
use App\Events\SendMessage;
use App\Models\chatSession;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
                'title' => substr($message, 0, 20)
            ]);
        }

        event(new SendMessage([
            'user_id' => $user->id,
            'message' => $message,
            'isBot'   => false,
            "session" => $session
        ]));

        $payload = [
            'message'    => $message,
            'user_id'    => (string) $user->id,
            'session_id' => (string) $sessionId,
        ];

        //dd($payload);

        $responseMessage = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer poc-key-123'
        ])->post($baseUrl . '/api/v1/chat', $payload);

        $session->touch();

        // $this->setResponse($responseMessage->json(), $sessionId->json());
        $this->setResponse($responseMessage->json(), $sessionId);


        return response()->json(['status' => 'ok']);
    }


    public function chatHistory()
    {
        $userId = Auth::id();
        $userChats = chatSession::where('user_id', $userId)
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json($userChats);
    }

    public function chatHistoryget($id)
    {
        $sessionId = (string) $id;
        $baseUrl   = config('services.bot_api.base_url');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer poc-key-123'
        ])->get("{$baseUrl}/api/v1/conversations/{$sessionId}/history");

        return response()->json($response->json());
    }

    public function reciveMessage(Request $request)
    {
        event(new ReciveMessage($request->all()));
    }

    public function setResponse($responseData, $sessionId)
    {
        $userId = Auth::id();
        $data = [
            'user_id' => $userId,
            'message' => $responseData['response'] ?? '',
            'isBot' => true,
            'sessionId' => $sessionId,
        ];
        event(new ReciveMessage($data));
    }

    public function chatDelete($sessionId)
    {
        $session = chatSession::where('session_id', $sessionId)->first();
        $userId = Auth::id();

        if ($session && $userId == $session->user_id) {
            $session->delete();
            $this->deleteFromRds($session->session_id);

            return response()->json(['status' => 'success', 'message' => 'Chat deleted successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'Unauthorized or chat not found'], 403);
    }

    function deleteFromRds($id)
    {
        try {
            $session = DB::connection('pgsql_rds')
                ->table('conversations')
                ->where('session_id', $id)
                ->first();

            if (!$session) {
                return;
            }

            DB::connection('pgsql_rds')
                ->table('messages')
                ->where('conversation_id', $session->id)
                ->delete();

            DB::connection('pgsql_rds')
                ->table('conversations')
                ->where('id', $session->id)
                ->delete();
        } catch (\Exception $e) {
            Log::error("Failed to delete from RDS: " . $e->getMessage());
        }
    }
}

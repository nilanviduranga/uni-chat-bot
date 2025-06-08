<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FetchUserDataController extends Controller
{

    function fetchUserData(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $user = User::find($request->user_id);
        return response()->json($user);
    }
}

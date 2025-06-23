<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\User;
use Illuminate\Http\Request;

class FetchUserDataController extends Controller
{

    function fetchUserData(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $user = User::where('id', $request->user_id)->get();
        return response()->json($user);
    }

    function fetchUserExamResult(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $examResults = ExamResult::where('user_id', $request->user_id)
            ->with('courseModule')
            ->get();
        return response()->json($examResults);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpLoginController extends Controller
{

    public function showEmailForm()
    {
        return view('auth.login');
    }

    public function requestOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        //check this email user avilabe
        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'This email is not registered.']);
        }

        // Check if an OTP has already been sent to this email within the last 5 minutes
        $recentOtps = OtpCode::where('email', $request->email)->get();
        $recentOtps->each(function ($otp) {
            $otp->delete();
        });

        $otp = rand(100000, 999999);


        OtpCode::create([
            'email' => $request->email,
            'code' => $otp,
            'expires_at' => now()->addMinutes(5),
        ]);

        // Send OTP via email
        Mail::raw("Your login code is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('Your Login OTP');
        });

        return view('auth.verify')->with('email', $request->email);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
        ]);

        $record = OtpCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Invalid or expired OTP']);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found for this email.']);
        }
        Auth::login($user);
        $record->delete();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

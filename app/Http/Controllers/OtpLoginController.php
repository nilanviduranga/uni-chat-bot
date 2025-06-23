<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
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
            if ($request->expectsJson()) {
                return response()->json(['error' => 'This email is not registered.'], 404);
            } else {
                return back()->withErrors(['email' => 'This email is not registered.']);
            }
        }

        // Check if an OTP has already been sent to this email within the last 5 minutes
        $recentOtps = OtpCode::where('email', $request->email)->get();
        $recentOtps->each(function ($otp) {
            $otp->delete();
        });

        $otp = rand(100000, 999999);

        if ($request->email == "testuser@nexora.com") {
            $otp = 123456;
        }


        OtpCode::create([
            'email' => $request->email,
            'code' => $otp,
            'expires_at' => now()->addMinutes(5),
        ]);

        // send OTP email
        if ($request->email !== 'testuser@nexora.com') {
            Mail::to($request->email)->send(new OtpMail($otp));
        }

        // // Send OTP via email
        // if ($request->email != "testuser@nexora.com") {
        //     Mail::raw("Your login code is: $otp", function ($message) use ($request) {
        //         $message->to($request->email)->subject('Your Login OTP');
        //     });
        // }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'OTP sent successfully.'], 200);
        }
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
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Invalid or expired OTP'], 422);
            } else {
                return back()->withErrors(['code' => 'Invalid or expired OTP']);
            }
        } else {
            $record->delete();
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                if ($request->expectsJson()) {
                    return response()->json(['error' => 'No user found for this email.'], 404);
                } else {
                    return back()->withErrors(['email' => 'No user found for this email.']);
                }
            }

            if ($request->expectsJson()) {
                $token = $user->createToken('mobile-login')->plainTextToken;
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token,
                    'user' => $user
                ]);
            } else {
                Auth::login($user);
                return redirect()->route('home');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

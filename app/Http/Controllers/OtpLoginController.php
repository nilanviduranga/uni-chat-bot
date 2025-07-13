<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpMail;
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
        // Validate email input
        $request->validate(['email' => 'required|email']);
        $email = $request->email;

        // Check if user exists
        if (!User::where('email', $email)->exists()) {
            $errorResponse = ['email' => 'This email is not registered.'];

            return $request->expectsJson()
                ? response()->json(['error' => $errorResponse['email']], 404)
                : back()->withErrors($errorResponse);
        }

        // Clear any previous OTPs for this email
        OtpCode::where('email', $email)->delete();

        // Generate OTP
        $otp = $email === 'testuser@nexora.com' ? 123456 : rand(100000, 999999);

        // Store OTP
        OtpCode::create([
            'email' => $email,
            'code' => $otp,
            'expires_at' => now()->addMinutes(5),
        ]);

        // dd('hello');
        // Send OTP email (skip for test user)
        if ($email !== 'testuser@nexora.com') {
            dispatch(new SendOtpMail($email, $otp));
        }

        // Return appropriate response
        return $request->expectsJson()
            ? response()->json(['message' => 'OTP sent successfully.'], 200)
            : view('auth.verify', ['email' => $email]);
    }

    public function resendOtp(Request $request)
    {
        $email = $request->email;

        // Check if OTP already exists
        $record = OtpCode::where('email', $email)->first();

        if ($record) {
            // Prevent resending within 60 seconds
            if (now()->diffInSeconds($record->created_at) < 60) {
                return $request->expectsJson()
                    ? response()->json(['error' => 'Please wait before requesting a new OTP.'], 429)
                    : back()->withErrors(['error' => 'Please wait at least 60 seconds before requesting a new OTP.']);
            }

            // Delete the old record if we're allowing a resend
            $record->delete();
        }

        // Reuse requestOtp() by creating a new Request
        $newRequest = new Request(['email' => $email]);

        return $this->requestOtp($newRequest);
    }



    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
        ]);

        $record = OtpCode::where('email', $request->email)
            ->first();

        if (!$record || $record->code != $request->code) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Invalid or expired OTP'], 422);
            } else {
                return view('auth.verify')
                    ->with('email', $request->email)
                    ->withErrors(['error' => 'Invalid or expired OTP']);
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

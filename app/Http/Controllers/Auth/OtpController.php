<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    // Show OTP verification form
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    // Send OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $email = $request->email;
        $otp = rand(100000, 999999);

        // Store OTP in session
        Session::put('otp', $otp);
        Session::put('email', $email);

        Log::info("Generated OTP: $otp for email: $email");

        // Send OTP email
        Mail::raw("Your OTP is: $otp", function ($message) use ($email) {
            $message->to($email)->subject('OTP Verification');
        });

        return redirect()->route('otp.verify')->with('success', 'OTP sent successfully.');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        // Retrieve OTP and email from session
        $storedOtp = Session::get('otp');
        $email = Session::get('email');
    
        if (!$storedOtp || !$email) {
            return redirect()->route('otp.verify')->with('error', 'Session expired or invalid. Please request a new OTP.');
        }
    
        if ($request->otp == $storedOtp) {
            // Find the user by email
            $user = User::where('email', $email)->first();
    
            if ($user) {
                // Update email_verified_at field
                $user->verified = 1;
                $user->save();
    
                // Authenticate user
                Auth::login($user);
                $request->session()->regenerate();
    
                // Clear session after successful verification
                Session::forget(['otp', 'email']);
    
                // Redirect based on user status
                $successMessage = 'Welcome, ' . $user->fname . '!';
    
                if ($user->status > 0 && $user->status < 3) {
                    return redirect()->intended('/admin')->with('success', $successMessage);
                } elseif ($user->status == 3) {
                    return redirect()->intended('/superadmin')->with('success', $successMessage);
                } else {
                    return redirect()->intended('/')->with('success', $successMessage);
                }
            }
        }
    
        return redirect()->route('otp.verify')->with('error', 'Invalid OTP. Please try again.');
    }
}    

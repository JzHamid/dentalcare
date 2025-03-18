<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['invalid' => 'Invalid email or password.'])->with('error', 'Invalid email or password.');
        }

        // Check if user is verified
        if ($user->verified != 1) {
            return back()->withErrors(['not_verified' => 'Your account is not verified. Please verify your email before logging in.'])
                ->with('error', 'Your account is not verified. Please verify your email before logging in.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user->is_online = true;
            $user->save();

            $successMessage = 'Welcome back, ' . $user->fname . '!';

            if ($user->status > 0 && $user->status < 3) {
                return redirect()->intended('/admin')->with('success', $successMessage);
            } elseif ($user->status == 3) {
                return redirect()->intended('/superadmin')->with('success', $successMessage);
            } else {
                return redirect()->intended('/')->with('success', $successMessage);
            }
        }

        return back()->withErrors(['invalid' => 'Invalid email or password.'])->with('error', 'Invalid email or password.');
    }



    public function logout()
    {
        $user = User::find(Auth::user()->id);
        $user->is_online = false;
        $user->save();

        Auth::logout();

        return redirect('/login');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'fname'        => 'required|string|max:255',
            'mname'        => 'nullable|string|max:255',
            'lname'        => 'required|string|max:255',
            'birth'        => 'required|date|before:today',
            'sexuality'    => 'required',
            'phone'        => 'required|digits_between:10,15',
            'email'        => 'required|email',
            'street_name'  => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'province'     => 'required|string|max:255',
            'postal_code'  => 'required|string|max:10',
            'password'     => 'required|string|min:8|confirmed',
        ]);

        try {
            DB::beginTransaction();

            // Generate a secure 6-digit OTP.
            $otp = random_int(100000, 999999);

            // Prepare data for user creation.
            $data['password']   = Hash::make($data['password']);
            $data['birthdate']  = $data['birth'];       // Map the 'birth' field to 'birthdate'.
            $data['gender']     = $data['sexuality'];   // Map the 'sexuality' field to 'gender'.
            $data['otp_code']   = $otp;

            // Create the user using mass assignment.
            $user = User::create($data);

            DB::commit();

            // Store email and OTP in session.
            Session::put('email', $user->email);
            Session::put('otp', $otp);

            // Send OTP Email (consider queuing this email in production).
            Mail::to($user->email)->send(new OtpMail($otp));

            return redirect()->route('otp.verify')
                ->with('success', 'Account created! Check your email for OTP.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('User Signup Error: ' . $e->getMessage(), ['exception' => $e]);
            return back()->withErrors(['error' => 'Something went wrong. Please try again later.'])
                ->withInput();
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('profile_images');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $user->image_path = 'profile_images/' . $filename;
        }

        $user->street_name = $request->street_name;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;

        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->birthdate = $request->birth;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;

        // Handle Specialty
        if ($request->specialty === "Other") {
            $user->specialty = "Other";
            $user->custom_specialty = $request->custom_specialty;
        } else {
            $user->specialty = $request->specialty;
            $user->custom_specialty = null;
        }

        $user->save();

        if (Auth::user()->status == 0) {
            return redirect('/user-profile')->with(['page' => 4, 'success' => 'Successfully updated profile!']);
        } else {
            return redirect('/admin')->with(['page' => 8, 'success' => 'Successfully updated profile!']);
        }
    }


    public function availability(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->is_online = $request->online;

        $user->save();

        return redirect('/admin')->with(['is_online' => $request->online]);
    }
}

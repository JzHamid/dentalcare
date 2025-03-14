<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::where('email', $request->email)->first();
            $user->is_online = true;
            $user->save();

            $successMessage = 'Welcome back, ' . $user->fname . '!';

            if ($user->status > 0 && $user->status < 3) {
                return redirect()->intended('/admin')->with('success', $successMessage);
            } else if ($user->status == 3) {
                return redirect()->intended('/superadmin')->with('success', $successMessage);
            } else {
                return redirect()->intended('/')->with('success', $successMessage); // Redirect regular users to /user
            }
        }

        return back()->withErrors(['invalid' => 'Invalid email or password.']);
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
        $validData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'birth' => 'required|date|before:today',
            'sexuality' => 'required',
            'phone' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:users,email',
            'street_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
        ]);
        try {
            $user = new User();
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->lname = $request->lname;
            $user->birthdate = $request->birth;
            $user->gender = $request->sexuality;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->street_name = $request->street_name;
            $user->city = $request->city;
            $user->province = $request->province;
            $user->postal_code = $request->postal_code;
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
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

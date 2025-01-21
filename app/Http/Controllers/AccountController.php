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

            if ($user->status > 0 && $user->status < 3) {
                return redirect()->intended('/admin');
            } else if ($user->status == 3) {
                return redirect()->intended('/superadmin');
            } else
                return redirect()->intended('/')->with('logged', true);
        }

        return back()->withErrors(['invalid' => 'Account not found.']);
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

        $user = new User();
        $user->fname = $validData['fname'];
        $user->mname = $validData['mname'];
        $user->lname = $validData['lname'];
        $user->birthdate = $validData['birth'];
        $user->gender = $validData['sexuality'];
        $user->phone = $validData['phone'];
        $user->email = $validData['email'];
        $user->street_name = $validData['street_name'];
        $user->city = $validData['city'];
        $user->province = $validData['province'];
        $user->postal_code = $validData['postal_code'];
        $user->password = bcrypt($validData['password']);

        $user->save();

        return redirect('login');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $path = $file->storeAs('images', time() . '_' . $file->getClientOriginalName(), 'public');
            $user->image_path = $path;
        }

        $request->validate([
            'street_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

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
        $user->address = $request->location;

        $user->save();

        if (Auth::user()->status == 0) {
            return redirect('/user-profile')->with(['page' => 4]);
        } else {
            return redirect('/admin')->with(['page' => 8]);
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

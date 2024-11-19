<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('logged', true);
        }

        return back()->withErrors(['invalid' => 'Account not found.']);
    }

    public function logout (Request $request) {

    }

    public function signup (Request $request) {
        $validData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'birth' => 'required|date|before:today',
            'phone' => 'required|digits_between:10,15',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->fname = $validData['fname'];
        $user->mname = $validData['mname'];
        $user->lname = $validData['lname'];
        $user->birthdate = $validData['birth'];
        $user->phone = $validData['phone'];
        $user->email = $validData['email'];
        $user->address = $validData['address'];
        $user->password = bcrypt($validData['password']);

        $user->save();

        return redirect('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(route('home'))->with('success', 'Logged in Successfully');
        }

        return redirect()->back()->with('error', 'Incorrect Email or Password entered');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Logged out Successfully');
    }
}

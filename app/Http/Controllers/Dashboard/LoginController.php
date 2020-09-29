<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }


    public function login(Request $request)
    {
        $validation  = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $remeber = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt($validation, $remeber)) {

            return redirect()->route('dashboard.home');
        }

        return redirect()->route('dashboard.login')->with(['errors' => 'invalid data']);
    }



    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}

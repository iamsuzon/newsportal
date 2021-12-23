<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check() != true)
        {
            return view('admin.auth.login');
        }
        else
        {
            return redirect()->route('admin.dashboard');
        }
    }

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }
}

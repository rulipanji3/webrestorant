<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $expectedUsername = env('ADMIN_USER');
        $expectedPassword = env('ADMIN_PASS');

        if (! $expectedUsername || ! $expectedPassword) {
            return back()->withErrors(['message' => 'Autentikasi admin belum dikonfigurasi.']);
        }

        if (
            hash_equals((string) $expectedUsername, $credentials['username']) &&
            hash_equals((string) $expectedPassword, $credentials['password'])
        ) {
            $request->session()->regenerate();
            $request->session()->put('admin_authenticated', true);

            return redirect()->intended(route('admin.orders.index'));
        }

        return back()->withErrors(['message' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_authenticated');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.show');
    }
}

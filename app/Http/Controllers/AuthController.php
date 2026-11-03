<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

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

        // 1. Check database User model (bcrypt hashed password)
        $dbUser = User::where('email', $credentials['username'])
            ->orWhere('name', $credentials['username'])
            ->first();

        if ($dbUser && Hash::check($credentials['password'], $dbUser->password)) {
            $request->session()->regenerate();
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_username', $dbUser->name);

            return redirect()->intended(route('admin.orders.index'));
        }

        // 2. Fallback to config-based admin credentials (safe with config:cache)
        $expectedUsername = config('services.admin.user');
        $expectedPassword = config('services.admin.pass');

        if (! $expectedUsername || ! $expectedPassword) {
            return back()->withErrors(['message' => 'Autentikasi admin belum dikonfigurasi.']);
        }

        if (
            hash_equals((string) $expectedUsername, $credentials['username']) &&
            hash_equals((string) $expectedPassword, $credentials['password'])
        ) {
            $request->session()->regenerate();
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_username', (string) $expectedUsername);

            return redirect()->intended(route('admin.orders.index'));
        }

        return back()->withErrors(['message' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.show');
    }
}

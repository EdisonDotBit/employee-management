<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerificationPin;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showVerifyPinForm()
    {
        if (!session('email')) {
            return redirect()->route('register');
        }

        return view('auth.verify-pin');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $pin = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'verification_pin' => $pin,
            'is_verified' => false,
        ]);

        try {
            Mail::to($user->email)->send(new SendVerificationPin($pin));
            return redirect()->route('verify.pin')->with([
                'email' => $user->email,
                'status' => 'Verification code sent to your email!'
            ]);
        } catch (\Exception $e) {
            $user->delete();
            return back()->with('error', 'Failed to send verification email. Please try again.');
        }
    }

    public function verifyPin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pin' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_pin', $request->pin)
            ->first();

        if (!$user) {
            return back()->withErrors(['pin' => 'Invalid verification code']);
        }

        $user->update([
            'is_verified' => true,
            'verification_pin' => null,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Account verified successfully!');
    }

    public function resendPin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $newPin = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->update(['verification_pin' => $newPin]);

        Mail::to($user->email)->send(new SendVerificationPin($newPin));

        return back()->with('status', 'New verification code sent!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        if (!$user->is_verified) {
            return redirect()->route('verify.pin')->with([
                'email' => $user->email,
                'error' => 'Please verify your email first'
            ]);
        }

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Models\User;
use App\Models\NormalUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
public function showLoginForm()
{
    return view('frontend.auth.login');
}

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        info('Attempting login for email: ' . $request->input('email'));

        $user = NormalUser::where('email', $credentials['email'])->where('is_active',1)->first();

        if ($user) {
            info('User found: ' . $user->email);

            if (Hash::check($credentials['password'], $user->password)) {
                info('Password match for user: ' . $user->email);
                if (Auth::guard('normal')->attempt($credentials)) {
                    info('Login successful for user: ' . $user->email);
                    return redirect()->intended('/');
                } else {
                    info('Auth attempt failed for user: ' . $user->email);
                }
            } else {
                info('Password mismatch for user: ' . $user->email);
            }
        } else {
            info('No user found with email: ' . $credentials['email']);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:normal_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = NormalUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::guard('normal')->login($user);
        return redirect()->intended('user/login');
    }

    public function logout()
    {
        // 'web' guard se logout
        Auth::guard('web')->logout();

        // 'normal' guard se logout
        Auth::guard('normal')->logout();
        return redirect('/');
    }

    public function updateStatus(Request $request, $id)
    {

        // return $id;
        $user = User::find($id);
        if ($user) {
            $user->is_active = $request->input('is_active');
            $user->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}

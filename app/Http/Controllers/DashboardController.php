<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;

class DashboardController extends Controller
{
    // Admin login method
    public function admin_login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'Please write your email',
                'password.required' => 'Please write your password',
                'email.email' => 'Please provide a valid email address',
            ]);

            $email = $request->email;
            $password = $request->password;
            $user = User::where('email', '=', $email)->first();

            if ($user && $user->hasRole('admin')) {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended('dashboard');
                } else {
                    return redirect()->back()->with('msg', 'Password not correct');
                }
            } else {
                return redirect()->back()->with('msg', 'Can’t access this page');
            }
        } else {
            return view('auth.login'); // Ensure a login view exists
        }
    }

    // Admin forget password method
    public function admin_forget_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $check = User::where('email', '=', $request->email)->first();

            if ($check && $check->hasRole('admin')) {
                Mail::to($check->email)->send(new ForgetPassword($check->id));
                return redirect()->back()->with('msg', 'Reset password link sent to your mail');
            } else {
                return redirect()->back()->with('msg', 'Sorry, email not found');
            }
        } else {
            return view('auth.forget-password'); // Ensure a forget-password view exists
        }
    }

    // Admin reset password view
    public function admin_reset_password($id)
    {
        return view('auth.reset-password', compact('id'));
    }

    // Admin update password
    public function admin_update_password(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Passwords do not match',
        ]);

        $id = $request->id;
        $password = Hash::make($request->password);
        User::where('id', '=', $id)->update([
            'password' => $password,
        ]);

        return redirect()->route('login')->with('msg', 'Your password has been updated successfully');
    }
}

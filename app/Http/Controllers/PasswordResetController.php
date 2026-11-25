<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    // Menampilkan form lupa password
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Mengirim tautan reset password
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return back()->with(
            $status === Password::RESET_LINK_SENT
                ? 'success'
                : 'error',
            __($status)
        );
    }

    // Menampilkan form password baru
    public function showResetPassword($token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => request('email'),
        ]);
    }

    // Menyimpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, $password) {
                $user->password = $password;
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')
                ->with('success', 'Password berhasil diubah. Silakan login.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}

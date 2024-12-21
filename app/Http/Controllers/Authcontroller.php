<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\forgetRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\PasswordRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\resetPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;



class Authcontroller extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function register(RegisterRequest $request)
{
    // Get validated data
    $validated = $request->validated();

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);


    Auth::login($user);

    return redirect()->route('index');
}


    /**
     * Store a newly created resource in storage.
     */
    public function login(LoginRequest $request)
{
    $validated = $request->validated();

    $credentials = [
        'email' => $validated['email'],
        'password' => $validated['password'],
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('tasks');
    }

    return back()->withErrors([
        'email' => 'The provided credentials are incorrect.',
    ]);
}



    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    Public function forgotPassword(forgetRequest $request){
        $email = $request->only('email');

       $status = Password::sendResetLink($email);

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password), // Using bcrypt to hash the password
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Password has been reset successfully!');
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }

}

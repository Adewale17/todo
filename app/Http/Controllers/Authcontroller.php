<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function register(RegisterRequest $request)
    {
        $credentials = $request->validate();
        $user = User::create($credentials);
        Auth::login($user);

        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('tasks');
        }

        return back()->withErrors(['email'=>'the provided credentials do not match our record']);
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
}

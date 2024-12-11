<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|email|string|unique:users',
            'password'=> 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        return redirect()->route('login')->with('success', 'Registration Successful, Please log in');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            // Redirect to the index page if the user is already logged in
            return redirect()->route('index');
        }
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors(['email'=>'the provided credentials do not match our record']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

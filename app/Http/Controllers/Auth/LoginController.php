<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() 
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('discussions.index');
        }

        return redirect()->back()->withInput()
            ->withErrors(['credentials' => 'The email or password is incorrect']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}

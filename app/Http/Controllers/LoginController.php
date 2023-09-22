<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        $formField = $request->only(['email', 'password']);
        if (Auth::attempt($formField)) {
            return redirect()->intended();
        }

        return redirect(route('login'))->withErrors([
            'password' => 'Неверный email или пароль'
        ]);
    }
}

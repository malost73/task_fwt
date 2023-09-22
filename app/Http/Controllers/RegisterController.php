<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    function save(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('register'))->withErrors([
                'email' => 'Пользователь с таким email уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect('/');
        }
        return redirect(route('login'))->withErrors([
            'email' => '',
            'formError' => 'Произошла ошибка при регистрации пользователя'
        ]);
    }
}

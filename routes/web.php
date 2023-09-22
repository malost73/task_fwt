<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('todo');
})->middleware('auth');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('login');
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('register');
})->name('register');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'save']);


//Route::post('/', [TaskController::class, 'addTask']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
})->name('logout');

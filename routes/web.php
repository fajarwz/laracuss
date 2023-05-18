<?php

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
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('pages.auth.login');
})->name('auth.login.show');

Route::get('sign-up', function () {
    return view('pages.auth.sign-up');
})->name('auth.sign-up.show');

Route::get('discussions', function () {
    return view('pages.discussions.index');
})->name('discussions.index');

Route::get('discussions/lorem', function () {
    return view('pages.discussions.show');
})->name('discussions.show');

Route::get('discussions/create', function () {
    return view('pages.discussions.form');
})->name('discussions.create');

Route::get('answers/1', function () {
    return view('pages.answers.form');
})->name('answers.edit');

Route::get('users/fajarwz', function () {
    return view('pages.users.show');
})->name('users.show');

Route::get('users/fajarwz/edit', function () {
    return view('pages.users.form');
})->name('users.edit');

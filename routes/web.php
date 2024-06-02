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
    return view('welcome');
});

Route::get('user-register-mail-templete',function(){
    return view('emails.user_register_mail');
 });


Route::get('reset-password-mail-templete',function(){
    return view('emails.reset_password');
 });

 Route::get('reset-password/{token?}',function(){
    return "Reset Password";
 });

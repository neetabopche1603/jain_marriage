<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

Route::get('user-register-mail-templete', function () {
    return view('emails.user_register_mail');
});


Route::get('reset-password-mail-templete', function () {
    return view('emails.reset_password');
});

Route::get('reset-password/{token?}', function () {
    return "Reset Password";
});

// ==========================================WEB==========================================================================

Route::get('/form', function () {
    return view('adminPanel.blankPage.form');
});

Route::get('/table', function () {
    return view('adminPanel.blankPage.table');
});




Route::get('admin/login', [AuthController::class, 'adminView'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'adminLogin'])->name('admin.loginPost');

Route::get('/admin-logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');
})->name('admin.logout');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'admin/'], function () {

        // dashboard

        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        // Users Controller
        Route::get('user-list', [UserController::class, 'usersList'])->name('admin.users');
        Route::get('user-create', [UserController::class, 'create'])->name('admin.create');
    });
});

<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// USER AUTH ROUTES
// Route::post('register', [UserAuthController::class, 'userRegister']);
Route::post('login', [UserAuthController::class, 'userLogin']);
Route::post('forgot-password', [UserAuthController::class, 'forgotPassword']);
Route::post('reset-password', [UserAuthController::class, 'resetPassword']);


Route::get('educations', [HomeController::class, 'educations']);
Route::get('professions', [HomeController::class, 'professions']);
Route::get('occupations', [HomeController::class, 'occupation']);
Route::get('hobbies', [HomeController::class, 'hobbies']);




Route::middleware('jwt:api')->group(function () {

    Route::get('/getUser', function () {
        // return User::all();
        return $user = JWTAuth::parseToken()->authenticate();
    });

    Route::post('user-profile-update', [UserProfileController::class, 'userProfileUpdate'])->name('user.profile');
    Route::post('user-profile-view', [UserProfileController::class, 'userProfileView']);
});


Route::post('register',[TestController::class,'userRegister']);

Route::get('get-countries',[TestController::class,'getcountries']);
Route::post('get-states',[TestController::class,'getStatesByCountry']);
Route::post('get-cities',[TestController::class,'getCitiesByState']);

<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
    return Redirect::route('admin.login');
})->name('admin.logout');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'admin/'], function () {

        // dashboard
        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        // Users Controller
        Route::get('user-list', [UserController::class, 'usersList'])->name('admin.users');
        Route::post('user-store', [UserController::class, 'store'])->name('admin.userStore');
        Route::get('user-create', [UserController::class, 'create'])->name('admin.create');
        Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
        Route::get('user-family-edit/{id}', [UserController::class, 'editFamily'])->name('admin.editfamily');
        Route::get('user-partner-edit/{id}', [UserController::class, 'editPartner'])->name('admin.editPartner');

        Route::get('user-upload-photo-edit/{id}', [UserController::class, 'editUserPhotoUpload'])->name('admin.editUserPhotoUpload');

        Route::get('user-document-edit/{id}', [UserController::class, 'editVerifyDocument'])->name('admin.editVerifyDocument');

        Route::get('user-profile/{id}', [UserController::class, 'userViewProfilePage'])->name('admin.userViewProfilePage');


        // User Personal Details update Route
        Route::post('user-personal-details-update', [UserController::class, 'userBasicPersonalDetailUpdate'])->name('admin.userBasicPersonalDetailUpdate');

        Route::post('user-family-details-update', [UserController::class, 'userFamilyDetailsUpdate'])->name('admin.userFamilyDetailsUpdate');

        Route::post('user-Partner-preference-details-update', [UserController::class, 'userPartnerPreferenceDetailsUpdate'])->name('admin.userPartnerPreferenceDetailsUpdate');

        Route::post('user-document-update', [UserController::class, 'userDocumentUpdate'])->name('admin.userDocumentUpdate');

        Route::get('user-account-status-update/{id}', [UserController::class, 'userAccountStatusUpdate'])->name('admin.userAccountStatusUpdate');

        Route::post('user-document-verify-status-update', [UserController::class, 'userVerificationDocStatusUpdate'])->name('admin.userVerificationDocStatusUpdate');

        Route::post('user-upload-photo-update', [UserController::class, 'uploadUserImageUpdate'])->name('admin.uploadUserImageUpdate');

        Route::get('user-photo-delete/{id}', [UserController::class, 'userPhotoDelete'])->name('admin.userPhotoDelete');

        Route::get('user-soft-delete/{id}', [UserController::class, 'userSoftDeleteData'])->name('admin.userSoftDeleteData');
        Route::get('user-details-permanent-delete/{id}', [UserController::class, 'userHardDeleteData'])->name('admin.userHardDeleteData');

        Route::get('user-deleted-list', [UserController::class, 'deletedUsersList'])->name('admin.deletedUsersList');

        // Profile Controller route
        Route::get('profile-details', [ProfileController::class, 'editProfileView'])->name('admin.editProfileView');
        Route::post('profile-update', [ProfileController::class, 'update_profile'])->name('admin.update_profile');

        Route::post('update-password', [ProfileController::class, 'update_password'])->name('admin.update_password');


        Route::post('get-state', [UserController::class, 'getState'])->name('admin.getState');
        Route::post('get-city', [UserController::class, 'getCity'])->name('admin.getCity');


        // Education
        Route::get('education-list',[HomeController::class,'educations'])->name('admin.educations');
        Route::post('education-store',[HomeController::class,'educationStore'])->name('admin.educationStore');
        Route::get('education-edit/{id?}',[HomeController::class,'editEducation'])->name('admin.editEducation');
        Route::post('education-update/{id?}',[HomeController::class,'educationUpdate'])->name('admin.educationUpdate');

        Route::get('education-status-update/{id?}',[HomeController::class,'educationStatusUpdate'])->name('admin.educationStatusUpdate');
        Route::get('education-delete/{id?}',[HomeController::class,'educationDelete'])->name('admin.educationDelete');

        // Professions
        Route::get('profession-list',[HomeController::class,'professions'])->name('admin.professions');
        Route::post('profession-store',[HomeController::class,'professionStore'])->name('admin.professionStore');
        Route::get('profession-edit/{id?}',[HomeController::class,'editprofession'])->name('admin.editprofession');
        Route::post('profession-update/{id?}',[HomeController::class,'professionUpdate'])->name('admin.professionUpdate');

        Route::get('profession-status-update/{id?}',[HomeController::class,'professionStatusUpdate'])->name('admin.professionStatusUpdate');
        Route::get('profession-delete/{id?}',[HomeController::class,'professionDelete'])->name('admin.professionDelete');

        //Occupation
        Route::get('occupation-list',[HomeController::class,'occupations'])->name('admin.occupations');

        Route::post('occupation-store',[HomeController::class,'occupationStore'])->name('admin.occupationStore');
        Route::get('occupation-edit/{id?}',[HomeController::class,'editOccupation'])->name('admin.editOccupation');
        Route::post('occupation-update',[HomeController::class,'occupationUpdate'])->name('admin.occupationUpdate');

        Route::get('occupation-status-update/{id?}',[HomeController::class,'occupationStatusUpdate'])->name('admin.occupationStatusUpdate');
        Route::get('occupation-delete/{id?}',[HomeController::class,'occupationDelete'])->name('admin.occupationDelete');


    });
});

Route::get('user-pdf-view', [UserController::class, 'userPdfView'])->name('admin.userPdfView');

Route::get('user-pdf-download', [UserController::class, 'downloadPDF'])->name('admin.downloadPDF');

Route::get('user-generatePdf', [UserController::class, 'generatePdf'])->name('admin.generatePdf');


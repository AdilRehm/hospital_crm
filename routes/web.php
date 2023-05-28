<?php

use App\Models\PatientModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoComplete;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController1;
use App\Http\Controllers\DischargeDetaile;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DischargeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/


Route::get('/logout', [HomeController1::class, 'logout']);



Route::get('/', [DashboardController::class, 'showTotalUsers']);
Route::middleware(['auth'])->group(function () {
    // medicine all routes////////////////
    Route::get('/medicine', function () {
        return view('medicine');
    });


    Route::post('/medicine', [MedicineController::class, 'store'])->name('medicine.store');

    Route::get('/medicine/edit/{id}', [MedicineController::class, 'edit'])->name('medicine.edit');
    Route::post('/medicine/update', [MedicineController::class, 'update'])->name('medicine.update');
    // view medicine routes
    Route::get('/viewmedicine', function () {
        return view('viewmedicine');
    });
    Route::get('/viewmedicine', [MedicineController::class, 'index']);
    Route::get('/viewmedicine/{id}', [MedicineController::class, 'delete'])->name('medicine.delete');

    // patient all routes////////////////
    Route::get('/patient', function () {
        return view('patient');
    });
    Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::post('/patient/update', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/viewpatient', [PatientController::class, 'index']); //this is for public when it goes to auth it will remove|not

    // view patient routes
    Route::get('/viewpatient/{id}', [PatientController::class, 'delete'])->name('viewpatient.delete');
    Route::get('/discharge/{id?}', [PatientController::class, 'discharge']);

    // discharge all routes////////////////
    Route::get('/discharge', function () {
        return view('/discharge');
    });

    Route::post('/get_data', [AutoComplete::class, 'get']);
    Route::post('/get_med', [AutoComplete::class, 'getmed']);

    // userrole all routes////////////////
    Route::get('/userrole', function () {
        return redirect('register');
    });
    Route::get('/dischargeslip', function () {
        return view('dischargeslip');
    });
    Route::get('dischargeslip', [DischargeController::class, 'index']);
    Route::post('/discharge_csutomer', [DischargeDetaile::class, 'create']);

    Route::get('/home', [HomeController1::class, 'index'])->name('home');
});


Route::middleware('web')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

// Auth::routes();

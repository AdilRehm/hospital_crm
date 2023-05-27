<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AutoComplete;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DischargeController;
use App\Http\Controllers\DischargeDetaile;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\PatientModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


Route::get('/logout', 'App\Http\Controllers\HomeController@logout');

Route::middleware(['auth'])->group(function () {
    // Route::get('/',function(){
    //     return view('dashboard');
    // });
    
    // Route::get('/dashboard',function(){
    //     return view('dashboard');
    // });

    Route::get('/', [DashboardController::class, 'showTotalUsers']);

    
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
    Route::get('/viewmedicine/{id}', [MedicineController::class,'delete'])->name('medicine.delete');
    
    // patient all routes////////////////
    Route::get('/patient', function () {
        return view('patient');
    });
    Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::post('/patient/update', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/viewpatient',[PatientController::class,'index']); //this is for public when it goes to auth it will remove|not
    
    
    // view patient routes
    Route::get('/viewpatient/{id}', [PatientController::class,'delete'])->name('viewpatient.delete');
    
    Route::get('/discharge/{id?}', [PatientController::class,'discharge']);
    
    // discharge all routes////////////////
    Route::get('/discharge', function () {
        return view('/discharge');
    });

    Route::post('/get_data', [AutoComplete::class, 'get']);
    Route::post('/get_med', [AutoComplete::class, 'getmed']);

    
    // userrole all routes////////////////
    Route::get('/userrole', function () {
        return view('/userrole');
    });
    // Route::post('/userrole', [UserController::class, 'store'])->name('userrole.store');
    
    Route::get('/dischargeslip', function () {
        return view('dischargeslip');
    });
    Route::get('dischargeslip',[DischargeController::class, 'index']);
    
    Route::post('/discharge_csutomer', [DischargeDetaile::class,'create']);

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
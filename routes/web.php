<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DischargeController;
use App\Http\Controllers\DischargeDetaile;
use App\Http\Controllers\UserController;
use App\Models\PatientModal;
use Illuminate\Http\Request;

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
// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('auth');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    });
});



//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [LoginController::class, 'login']);
//Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/dashbaord','HomeController@index');

//unauth access routes-----------------------------------------------------

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


//-----------------------------------------------------------------------

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
Route::get('/viewpatients/{id}', [PatientController::class,'delete'])->name('viewpatient.delete');

// discharge all routes////////////////
Route::get('/discharge', function () {
    return view('/discharge');
});

// userrole all routes////////////////
// Route::get('/userrole', function () {
//     return view('userrole');
// });


//Route::post('/userrole', [UserController::class, 'store'])->name('userrole.store');

Route::get('/dischargeslip', function () {
    return view('dischargeslip');
});
Route::get('dischargeslip',[DischargeController::class, 'index']);

Route::post('/discharge_csutomer', [DischargeDetaile::class,'create']);

Route::get('/',function(){
    return view('auth.login');
    })->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('userrole',[AuthController::class, 'register'])->name('userrole');
    Route::post('/register',[AuthController::class, 'register_new_user']);

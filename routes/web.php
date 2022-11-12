<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;

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

Route::middleware(['role'])->group(function () {
    Route::get('/', function () {
        return view('Auth.login');
    })->name('login');
    Route::post('login', [AuthController::class ,'LoginAuth'])->name('auth.login');
});
Route::middleware(['auth'])->group(function () {
    Route::get("registration",[AuthController::class ,'Registeration'])->name('auth.register');
    Route::post('register',[AuthController::class,'UserRegistration'])->name('auth.registration');
    Route::get('/dashboard', function () {
        return view('dashbord');
    })->name('dashbord');
    Route::get('logout', [AuthController::class,'signOut'])->name('auth.logout');
    Route::get("/Profile",function (){
        return view('Profile');
    })-> name('user.profile');
    Route::get("/Profile/edit",function (){
        return view('editprofile');
    })-> name('user.profile.edit');
    Route::post("/Profile/edit",[AuthController::class ,'ProfileUpdate'])-> name('user.profile.update');
    //Tax
    Route::get('/Tax', [TaxController::class,'view'])->name('taxinfo');
    Route::get('/Tax/pay',[TaxController::class,'index'])->name('paytax');
    Route::post('store',[TaxController::class,'store']);
    Route::get('/show',[TaxController::class,'show']);
    Route::get('/delete/{id}',[TaxController::class,'destroy']);
    Route::get('/edit/{id}',[TaxController::class,'edit']);
    Route::post('/update/{id}',[TaxController::class,'update']);
    Route::post('store',[TaxController::class,'store'])->name('Pay');
    Route::post('/tax/owner/{id}',[TaxController::class,'carinfo'])->name('carinfo');
    // Accidents
    
    Route::get('/Accident',[PostController::class,'index'])->name('accinfo');
    Route::get('/Accident/Create',[PostController::class,'create'])->name('acc_crt');
    Route::post('/Accident/show',[PostController::class,'store'])->name('createRecord');
    Route::get('/Accident/delete/{id}',[PostController::class,'destroy'])->name('destroyRecord');
    Route::get('/Accident/edit/{id}',[PostController::class,'edit'])->name('edtrcd');
    Route::post('/Accident/update',[PostController::class,'update'])->name('updateRecord');
    //CarRegistered
    Route::get('/Car', [CarController::class,'CarRegistration'])->name('CarRegistration');
    Route::get('/Car/Register', function(){
        return view('car.Register');
    })->name('CarAdd');
    Route::post('/Car/Register',[CarController::class,'CarRegistered'])->name('CarRegistered');
    Route::get('/Car/Edit/{id}',[CarController::class,'EditRegisteredCar'])->name('EditRegisteredCar');
    Route::post('/Car/Edit',[CarController::class,'EditCardetails'])->name('EditCardetails');
    Route::get('/Car/Delete/{id}',[CarController::class,'DeleteCardetails'])->name('DeleteCardetails');
});
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
/////////////////////////........Public Route  Section......///////////////////
Route::get('/', function () {
    return view('login');
});

/////////////////////////........Login Section......///////////////////
Route::get('login',[AdminController::class,'login'])->name('login');
Route::post('verify_login',[AdminController::class,'create'])->name('verify_login');

/////////////////////////........Register Section......///////////////////
Route::get('register',[AdminController::class,'register'])->name('register');
Route::post('sign_up',[AdminController::class,'store'])->name('sign_up');

/////////////////////////........Forget Section......///////////////////
Route::get('forget_password',[AdminController::class,'forgetPassword'])->name('forget');
Route::post('submit_forget',[AdminController::class,'Forget'])->name('submit_forget');

/////////////////////////........Reset Password Section......///////////////////
Route::get('reset_password',[AdminController::class,'resetPassword'])->name('reset_password');
Route::post('submit_reset',[AdminController::class,'postReset'])->name('submit_reset');

/////////////////////////........MiddleWare Auth  Section......///////////////////
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    /////////////////////////........Users  Section......///////////////////
    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('users_list',[UserController::class,'list']);
});

Route::post('logout',[AdminController::class,'logout'])->name('logout');

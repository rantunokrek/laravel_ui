<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/diposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('diposite.money')->middleware('verified');;

// for mal trap

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// this route for showing varification page 
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//this route for resend mail again
Route::post('/resend-mail', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');
// encript and decript
Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'userDetail'])->name('user.details');
// hashing password
Route::post('/user/store', [App\Http\Controllers\HomeController::class, 'passHashing'])->name('store.user');
// password Change
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'passChange'])->name('password.change');
// pass update
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'passUpdate'])->name('password.update');
//class
Route::get('/class', [App\Http\Controllers\ClassController::class, 'classIndex'])->name('class.index');
Route::get('class/create', [App\Http\Controllers\ClassController::class, 'classCreate'])->name('class.create');
Route::post('class/store', [App\Http\Controllers\ClassController::class, 'classStore'])->name('class.store');

Route::get('class/delete/{id}', [App\Http\Controllers\ClassController::class, 'delete'])->name('class.delete');
Route::get('class/edit/{id}', [App\Http\Controllers\ClassController::class, 'edit'])->name('class.edit');
Route::post('class/update/{id}', [App\Http\Controllers\ClassController::class, 'update'])->name('class.update');

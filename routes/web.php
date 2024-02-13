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



Route::resource('sender', App\Http\Controllers\SenderController::class)->only('index', 'show');

Route::resource('beneficiary', App\Http\Controllers\BeneficiaryController::class)->only('index','show');

<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('employee', EmployeeController::class);
});

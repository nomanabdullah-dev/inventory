<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdvancedSalaryController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('employee', EmployeeController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('advancedsalary', AdvancedSalaryController::class);
});

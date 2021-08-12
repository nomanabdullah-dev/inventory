<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdvancedSalaryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;

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
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('expense', ExpenseController::class);
    Route::get('todayExpense', [ExpenseController::class, 'todayExpense'])->name('todayExpense');
    Route::get('monthlyExpense', [ExpenseController::class, 'monthlyExpense'])->name('monthlyExpense');
    Route::get('monthwiseExpense/{month}', [ExpenseController::class, 'monthwiseExpense'])->name('monthwiseExpense');
    Route::get('yearlyExpense', [ExpenseController::class, 'yearlyExpense'])->name('yearlyExpense');
    Route::resource('attendance', AttendanceController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('pos', PosController::class);

    //Product Import and Export Route
    Route::get('product-export-import', [ProductController::class,'productExportImport'])->name('product.export.import');
    Route::get('product-export', [ProductController::class,'productExport'])->name('productexport');
    Route::post('product-import', [ProductController::class,'productImport'])->name('productimport');
});

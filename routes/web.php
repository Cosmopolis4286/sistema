<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;


Route::get('/', [EmployeeController::class, 'index'])->name('index');

Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::post('store', [EmployeeController::class, 'store'])->name('store');
    Route::post('update', [EmployeeController::class, 'update'])->name('update');
    Route::post('delete', [EmployeeController::class, 'delete'])->name('delete');
});
Route::get('export', [ExportController::class, 'export'])->name('export');

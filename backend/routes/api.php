<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/employees',[EmployeeController::class,'index'])->name('employee.list');
Route::get('employee/show/{id}',[EmployeeController::class,'show'])->name('employee.list');
Route::get('employee/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('employee/save',[EmployeeController::class,'store'])->name('employee.save');
Route::put('employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employee.delete');

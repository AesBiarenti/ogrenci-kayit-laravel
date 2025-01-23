<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::post('/store', [StudentController::class, 'store'])->name('students.store');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


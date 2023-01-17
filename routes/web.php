<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/dashboard',[CompanyController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Company/Add',[CompanyController::class,'create'])->middleware(['auth', 'verified'])->name('company.add.go');
Route::post('/Company/Add',[CompanyController::class,'store'])->middleware(['auth', 'verified'])->name('company.add');
Route::get('/Company/Edit/{id}',[CompanyController::class,'edit'])->middleware(['auth', 'verified'])->name('company.edit.go');
Route::post('/Company/Edit/{id}',[CompanyController::class,'update'])->middleware(['auth', 'verified'])->name('company.edit');
Route::get('/Company/delete/{id}',[CompanyController::class,'destroy'])->middleware(['auth', 'verified'])->name('company.delete');

Route::get('/Employees_List',[EmployeeController::class,'index'])->middleware(['auth', 'verified'])->name('Employee.list');
Route::get('/Employees/add',[EmployeeController::class,'create'])->middleware(['auth', 'verified'])->name('Employee.add.go');
Route::post('/Employees/add',[EmployeeController::class,'index'])->middleware(['auth', 'verified'])->name('Employee.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

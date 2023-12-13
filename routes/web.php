<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashboardController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/dashboard', [CompaniesController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/companies/store/', [CompaniesController::class, 'store'])->name('companies.store');
Route::get('/companies/create/', [CompaniesController::class, 'create'])->name('companies.create');
Route::get('/companies/edit/{company}', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/update/{company}', [CompaniesController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');

Route::get('/employees/create/{company}', [EmployeesController::class, 'create'])->name('employees.create');
Route::post('/employees/store/{company}', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

require __DIR__.'/auth.php';

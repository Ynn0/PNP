<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PlantillaItemController;
use App\Http\Controllers\DepartmentController;
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

Route::resource('employees', EmployeeController::class);
Route::resource('plantilla-items', PlantillaItemController::class);
Route::resource('departments', DepartmentController::class);

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// Custom routes for PlantillaItems within the same controller
Route::get('/plantilla-items/{id}', [DepartmentController::class, 'show'])->name('plantilla_items.show');
Route::get('/plantilla-items/{id}/edit', [DepartmentController::class, 'edit'])->name('plantilla_items.edit');
Route::put('/plantilla-items/{id}', [DepartmentController::class, 'update'])->name('plantilla_items.update');
Route::delete('/plantilla-items/{id}', [DepartmentController::class, 'destroy'])->name('plantilla_items.destroy');

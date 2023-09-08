<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CutiController;


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

// Route::middleware(['checkRole:STAFF'])->group(function () {
//     Route::get('/home-staff', [HomeController::class, 'indexStaff'])->name('staff.home');
//     Route::get('/form_reimbursement', [ReimbursementController::class, 'create'])->name('staff.create');
//     Route::post('/form_reimbursement', [ReimbursementController::class, 'store'])->name('staff.store');
// });

// Route::middleware(['checkRole:FINANCE'])->group(function () {
//     Route::get('/home-finance', [HomeController::class, 'indexFinance'])->name('finance.home');
// });

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/edit-profile', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/edit-profile/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.indexEmployee');
    Route::get('/show-employee/{id}', [EmployeeController::class, 'show'])->name('admin.showEmployee');
    Route::get('/add-employee', [EmployeeController::class, 'create'])->name('admin.addEmployee');
    Route::post('/add-employee', [EmployeeController::class, 'store'])->name('admin.storeEmployee');
    Route::get('/employee/{id}', [EmployeeController::class, 'edit'])->name('admin.editEmployee');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('admin.updateEmployee');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('admin.destroyEmployee');

    Route::get('/cutis', [CutiController::class, 'index'])->name('admin.indexCuti');
    Route::get('/add-cuti', [CutiController::class, 'create'])->name('admin.addCuti');
    Route::post('/add-cuti', [CutiController::class, 'store'])->name('admin.storeCuti');
    Route::get('/cuti/{id}', [CutiController::class, 'edit'])->name('admin.editCuti');
    Route::put('/cuti/{id}', [CutiController::class, 'update'])->name('admin.updateCuti');
    Route::delete('/cuti/{id}', [CutiController::class, 'destroy'])->name('admin.destroyCuti');
});

// Route::middleware(['checkRole:FINANCE,DIREKTUR'])->group(function () {
//     Route::post('/home-update/{id}', [ReimbursementController::class, 'update'])->name('submission.update');
// });

// Route::get('/download/{filename}', [ReimbursementController::class, 'download'])->name('download.document');

Route::get('/', [LoginController::class, 'index'])->name('root-login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticated'])->name('login');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

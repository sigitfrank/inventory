<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Transactions\TransactionController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Modules\ModuleController;

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

Auth::routes(['verify' => true]);

Route::middleware('auth', 'verified')->group(function () {
    // hanya user yang verified yang bisa mengakses route ini
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/kirim-email', [EmailController::class, 'index']);

    // Products
    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products/create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products/store');
    Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products/destroy');
    
    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions/create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions/store');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions/destroy');

    // User Management
    Route::get('/users',[UserController::class, 'index'])->name('users');
    Route::get('/users/{user}',[UserController::class, 'show'])->name('users/show');
        // User Toggle Managemenet
        Route::put('/users/{user}/toggle',[UserController::class, 'userToggle'])->name('users/toggle');

    // Module Management
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules/create');
});

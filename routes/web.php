<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoCurrencyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

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
    return view('welcome');})
    ->name('home');

Route::get('/crypto',
    [CryptoCurrencyController::class, 'index'])
    ->name('crypto');

Route::get('/buy', function () {
    return view('buy');
})->name('buy');

Route::get('/currencies',
    [CurrencyController::class, 'index'])
    ->name('currencies');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/create', [AccountController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('accounts.store');

Route::get('/create', [AccountController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('accounts.create');

Route::get('/accounts', [AccountController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('accounts.show');

Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('accounts.destroy');

Route::get('/transfer/{id}', [TransactionController::class, 'transfer'])
    ->middleware(['auth', 'verified'])
    ->name('transfer');

Route::get('/transactions/{id}', [TransactionController::class, 'transactions'])
    ->middleware(['auth', 'verified'])
    ->name('transactions');

Route::post('/transfer/{id}', [TransactionController::class, 'processTransfer'])
    ->middleware(['auth', 'verified'])
    ->name('transfer.process');

require __DIR__.'/auth.php';

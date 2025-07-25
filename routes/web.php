<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivationController;

Route::get('/', [ActivationController::class, 'index'])->name('index');

Route::post(
    '/register-receipt',
    [ActivationController::class, 'storeReceipt']
)->name('register-receipt');

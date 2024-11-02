<?php

use App\Http\Controllers\Front\SiteController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('front.')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('index');
});


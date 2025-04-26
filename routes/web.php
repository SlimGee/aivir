<?php

use App\Http\Controllers\CallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/pages/{page}', [PagesController::class, 'show'])->name('pages.show');
Route::get('/auth/{social}/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect')
    ->whereIn('social', ['google']);

Route::get('/auth/{social}/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.callback')
    ->whereIn('social', ['google']);

Route::prefix('app')->middleware(['auth'])->name('app.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('root');
    Route::resource('users', UsersController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('calls', CallController::class);
    Route::post('/update-status', [StatusController::class, 'update'])->name('status.update');
});

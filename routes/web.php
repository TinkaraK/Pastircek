<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['guest'])->group(function () {
    Route::get('login', [\App\Http\Controllers\AuthController::class, "showLoginForm"])->name('login');
    Route::post('login', [\App\Http\Controllers\AuthController::class, "login"]);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Controllers\HomeController::class)->name("home");
    Route::post('logout', [\App\Http\Controllers\AuthController::class, "logout"])->name('logout');

    Route::get("users/{user}/reset-password", [\App\Http\Controllers\UserController::class, "sendPasswordResetMail"])->name("users.reset-password");
    Route::resource("users", \App\Http\Controllers\UserController::class)->except("destroy");

    Route::resource("gerks", App\Http\Controllers\GerkController::class);
    Route::resource("gerks.work-tasks", \App\Http\Controllers\GerkWorkTaskController::class);
    Route::resource("work-tasks", \App\Http\Controllers\WorkTaskController::class);
});

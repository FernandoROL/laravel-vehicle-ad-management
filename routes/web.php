<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
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
Route::redirect("/","dashboard");

Route::prefix("dashboard")->group( function () {
    Route::get("/",[DashboardController::class,"index"])->name("dashboard.index");
});

Route::prefix('reports')->group( function () {
    Route::get("/",[QueryController::class,"index"])->name("query.index");

    Route::get("/SQL01",[QueryController::class,"showUserVehicleCount"])->name("01.query");
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');

    Route::get('/registerUser', [UserController::class, 'registerUser'])->name('register.user');
    Route::post('/registerUser', [UserController::class, 'registerUser'])->name('register.user');

    Route::get('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');

    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
});
<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, "index"])->name('home')->middleware(["auth", "ensureProperRedirectToHome"]);

Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/login', [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::post('/logout', [AuthController::class, "logout"])->name('logout');

// Admin Routes
Route::prefix("admin")->name("admin.")->middleware("ensureUserHasAdminRole")->group(function() {

    Route::get("/dashboard", [DashboardController::class, "adminDashboard"])->name("dashboard");

    // User
    Route::get("/users/userslist", [UserController::class, "userlist"])->name("userslist");
    
});

// DGR (Demand Generation Representative) Routes
Route::prefix("dgr")->name("dgr.")->group(function() {

    Route::get("/dashboard", [DashboardController::class, "dgrDashboard"])->name("dashboard");

});
<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('home')->middleware(["auth", "ensureProperRedirectToHome"]);

Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/login', [AuthController::class, "login"]);

// Admin Routes
Route::prefix("admin")->name("admin.")->middleware("ensureUserHasAdminRole")->group(function() {

    Route::get("/dashboard", [HomeController::class, "dashboard"])->name("dashboard");
    
});

// DGR (Demand Generation Representative) Routes
Route::prefix("dgr")->name("dgr.")->group(function() {



});
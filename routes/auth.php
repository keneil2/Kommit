<?php
use App\Http\Controllers\Auth\CurrentSessionController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function(){
Route::get("/login",[CurrentSessionController::class,"show"])->name("login");
Route::post("/auth",[CurrentSessionController::class,"store"]);  
Route::post("/register",[UserController::class,"store"]);
});

Route::middleware("auth:sanctum")->group(function(){
Route::post("/logout",[CurrentSessionController::class,"destroy"]);
});
Route::post("/email-verification",[EmailVerificationController::class,"store"]);
Route::get("/email-verification",[EmailVerificationController::class,"show"]);


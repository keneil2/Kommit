<?php
use App\Http\Controllers\Auth\CurrentSessionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function(){
Route::get("/login",[CurrentSessionController::class,"show"]);
Route::post("/auth",[CurrentSessionController::class,"store"]);  
Route::post("/register",[UserController::class,"store"]);
});


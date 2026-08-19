<?php 

use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->group(function(){
  Route::get("dashboard",function(){
    echo "hello welcome to your dashboard";
  })->name("dashboard");
});
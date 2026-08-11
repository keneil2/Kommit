<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class CurrentSessionController extends Controller
{

    public function show(){
     return Inertia::render('Login');
    }
    public function store(LoginRequest $request){
     if(Auth::attempt(['email','password'])){
         return route("dashboard");
     }else{
       return back()->withErrors([
           "auth_error"=>"The provided credentials do not match our records."
       ]);
       
     }
    }

    public function destroy(Request $request){
       Auth::logout();
       Session::regenerate();
       return Inertia::render('Login');
    }
}

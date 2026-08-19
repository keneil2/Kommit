<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class CurrentSessionController extends Controller
{

    public function show(){
     return Inertia::render('Auth');
    }
    public function store(LoginRequest $request,LoginAction $action){
        return $action->handle($request);
    }

    public function destroy(Request $request){
       Auth::logout();
       Session::regenerate();
       return Inertia::render('Login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\EmailVerificationAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    
   public function show(){
    return Inertia::render("EmailVerification");
   }
public function store(Request $request, EmailVerificationAction $action){
            $request->validate([
                "verification_code"=> "string|required|max:6",
                "email"=>"string|required|email"
            ]);
       return  $action->handle($request);
    }
}

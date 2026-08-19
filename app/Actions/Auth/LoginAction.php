<?php 

namespace App\Actions\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
class LoginAction{
 public function handle(LoginRequest $request){
 
 if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    $user = auth()->user();
    return $user->email_verified_at !== null 
    ? redirect("/dashboard") :
    redirect("/email-verification?email=".urlencode($user->email));
     }else{
       return back()->withErrors([
           "auth_error"=>"The provided credentials do not match our records."
       ]);
       
     }
 }
}
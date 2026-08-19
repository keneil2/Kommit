<?php 

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EmailVerificationAction{
    public function handle(Request $request){
     $userCode = $request->verification_code;
     $email=$request->email;
     $actualCode = Cache::get($request->email);     
     
      $user = User::where("email",$email)->first(); 

     if(!$this->hasBeenVerified($user)){
     
         $isVerified = $this->verifyCode($userCode,$actualCode);
         if($isVerified==true){
         $user->email_verified_at = now();
         $user->save();
          return redirect()->to("/dashboard");
         }
         return redirect()->to("/login");
         
    }

        
     }

     private function hasBeenVerified($user): bool{
          if($user->email_verified_at){
             return true;
          }
          return  false;
          
     }
 
     private function verifyCode($userCode,$actualCode){
        if($userCode == $actualCode){
          return true;
        }
        return false;
     }
}
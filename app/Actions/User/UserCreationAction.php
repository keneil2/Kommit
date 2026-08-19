<?php
namespace App\Actions\User;
use App\Http\Requests\User\NewUserRequest;
use App\Mail\EmailVerification;
use App\Mail\WelcomeMail;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class UserCreationAction
{

    public function handle(NewUserRequest $request, UserInterface $userRepo)
    {  
        $user=null; 
        DB::transaction(function () use ($userRepo, $request,&$user) {
             $user = $userRepo->create($request);
        });
          Mail::to($user?->email)->send(new WelcomeMail($user));
          $code = $this->getCode();
           Mail::to($user?->email)->send(new EmailVerification($code));
    
           Log::debug("email sent and user created",$user?->toArray());

           // caching verification 
           Cache::put($user?->email,$code,now()->plus(minutes: 10));
           
    }

    private function getCode(){
       $code = random_int(0,999999);
        return str_pad($code,6,"0",STR_PAD_LEFT);
    }

    

}
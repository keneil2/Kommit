<?php 

use App\Http\Requests\User\NewUserRequest;
use App\Repositories\Interfaces\UserInterface;

class UserCreationAction {

    public function handle(NewUserRequest $request,UserInterface $userRepo){
          DB::transaction(function()use($userRepo,$request){
          $userRepo->create($request);
          },2);
    }
}
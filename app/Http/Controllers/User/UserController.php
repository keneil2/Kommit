<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UserCreationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\NewUserRequest;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\UserRepository;


class UserController extends Controller
{
public  $userCreationAction;
   public function __construct(){
        $this->userCreationAction= new UserCreationAction();
   }
  public function store(NewUserRequest $request,UserRepository $userRepo){
     $this->userCreationAction->handle($request,$userRepo);
  }
}


// master more laravel and vue js, tailwind and sql, docker, aws,redis 

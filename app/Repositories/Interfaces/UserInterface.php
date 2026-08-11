<?php 
namespace App\Repositories\Interfaces;

use App\Http\Requests\User\NewUserRequest;
interface UserInterface{
 public function create(NewUserRequest $request );
}
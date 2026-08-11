<?php 
namespace App\Repositories;
use App\Http\Requests\User\NewUserRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface{
    public function create(NewUserRequest $request){
    User::create([
        "email"=>$request->email,
        "password"=> Hash::make($request->password)
    ]);
    }
}
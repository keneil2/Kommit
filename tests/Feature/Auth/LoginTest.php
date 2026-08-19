<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('assert login return use to dashboard route if password is correct', function () {
    // assuming a user was created may need to create one for this test
    User::factory()->create([
    "email"=>"test45@gmail.com",
    "password"=> Hash::make("test@1234"),
    "email_verified_at"=>now(),
    ]);

    $response = $this->post("/auth",[
        "email"=>"test45@gmail.com",
        "password"=>"test@1234"
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasNoErrors();
});

test('assert login return use to login with errors messages if password is incorrect', function () {
    $this->actingAsGuest();
  $response = $this->post("/auth",[
        "email"=>"test123@gmail.com",
        "password"=>"12345678"
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors(["auth_error"]);
});

test("assert that email and password fields are required",function(){
$this->actingAsGuest();
  $response = $this->post("/auth",[
        "email"=>"",
        "password"=>""
    ]);
    $response->assertStatus(302);
    $response->assertSessionHasErrors();
});

test("assert user is redirected to email verification when email is not verified",function(){
$this->actingAsGuest();

 User::factory()->create([
    "email"=>"test455@gmail.com",
    "password"=> Hash::make("test@1234"),
        "email_verified_at"=>null,
    ]);

  $response = $this->post("/auth",[
        "email"=>"test455@gmail.com",
        "password"=>"test@1234"
    ]);

     $response->assertSessionDoesntHaveErrors();
    $response->assertStatus(302);

    $response->assertRedirect("/email-verification?email=test455%40gmail.com");
    
});
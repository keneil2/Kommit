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
    $response->assertRedirect("/dashboard");
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

test("assert that if the user logs in five times they receive a 429 error message", function () {
    $limit=10;  
    for($i = 0; $i <= $limit; $i++){
        $this->post("/auth",[
        "email"=>"test4@gmail.com",
        "password"=>"test@"
        ]);
      }
       $response = $this->post("/auth",[
        "email"=>"test455@gl.com",
        "password"=>"test@1"
        ]);

        $response->assertStatus(429);
});

// this is configurage from the env so I can test that the ttl for rememberme Cookie is correct
test("assert that remember_me token resets after 5 seconds",function(){
    $this->post("/auth",[
        "email"=>"test455@gmail.com",
        "password"=>"test@1234"
        ]);
        sleep(5);
        $response = $this->get("/dashboard");
        $response->assertRedirect('/login');
        $response->assertStatus(302);
});



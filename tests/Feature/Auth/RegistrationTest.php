<?php

use App\Mail\EmailVerification;
use App\Mail\WelcomeMail;
use Hoa\Event\Test\Unit\Event;
use Illuminate\Support\Facades\Log;
use Inertia\Testing\AssertableInertia as Assert;


test("assert registration page can be rendered",function(){
     $this->actingAsGuest();
    $response = $this->get("/login");
    $response->assertStatus(200);
});



test('assert user can be registered', function () {
    $this->actingAsGuest();
    $response = $this->post('/register',[
    "name"=>"tester1",
    "email"=>"test@gmail.com",
    "password"=>"test@1234",
    "password_confirmation"=>"test@1234"
    ]);
    $response->assertSessionHasNoErrors();
    $response->assertStatus(302);
});


test('assert email verification screen is rendered', function () {
     
    $this->actingAsGuest();
    $response = $this->post('/register',[
    "name"=>"tester1",
    "email"=>"test@gmail.com",
    "password"=>"test@1234",
    "password_confirmation"=>"test@1234"
    ]);
    
    $response->assertRedirect("email-verification?email=test%40gmail.com");
});

test('assert verification and Welcomemail are queued when email is sent', function () {
    Mail::fake();
    $this->actingAsGuest();
    $response = $this->post('/register',[
    "name"=>"tester1",
    "email"=>"test@gmail.com",
    "password"=>"test@1234",
    "password_confirmation"=>"test@1234"
    ]);

    $response->assertStatus(302);

    Mail::assertQueued(WelcomeMail::class);
    Mail::assertQueued(EmailVerification::class);
    
});

// test('assert email can be email', function () {
//     Mail::fake();
//     $this->actingAsGuest();
//     $response = $this->post('/register',[
//     "email"=>"test@gmail.com",
//     "password"=>"test@1234",
//     "password_confirmation"=>"test@1234"
//     ]);
    
//     $response->assertRedirect("/email-verification");
// });


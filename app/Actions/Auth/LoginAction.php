<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
class LoginAction
{
  public function handle(LoginRequest $request)
  {

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      $user = auth()->user();

      $this->clearLoginAttempts($request->ip(), $user);

      $this->setupCustomRemeberToken($user);
      
      $this->resetRememberMeToken($user);

      return $user->email_verified_at !== null
        ? redirect("/dashboard") :
        redirect("/email-verification?email=" . urlencode($user->email));
    } else {
      return back()->withErrors([
        "auth_error" => "The provided credentials do not match our records."
      ]);

    }
  }
  public function clearLoginAttempts($ip, $user)
  {
    RateLimiter::clear($this->throttleKey($ip, $user->email));
  }
  public function throttleKey($ip, $email): string
  {
    return Str::transliterate($ip);
  }

  function setupCustomRemeberToken($user)
  {
    // cache user remember for 30 days 
    $ttl = config("app.remember_token_ttl");
    if ($user->remember_token) {

      Cache::put($user->email, $ttl);
    }

  }

  function resetRememberMeToken($user)
  {
    if (!Cache::get($user->email))
      $user->remember_token = null;
    $user->save();
  }
}
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('setup', function () {
    $credentials = [
      'email' => 'admin@admin.com',
      'password' => 'qqqqqqqq'
    ];
  
    if (!Auth::attempt($credentials)) {
      $user = new \App\Models\User();
  
      $user->name = 'Admin';
      $user->email = $credentials['email'];
      $user->password = Hash::make($credentials['password']);
      $user->is_admin = true;
  
      $user->save();
      echo "\033[92mSetup successful\033[39m";
    } else {
      echo "\033[31mUnable to setup. User exists!\033[39m";
    }
})->purpose('Setup for postman');

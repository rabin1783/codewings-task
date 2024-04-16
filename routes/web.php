<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;
use Laravel\Socialite\Facades\Socialite;


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
  Route::resource('/jsons', JsonController::class)->except('show');
  Route::post('/upload-json/{id}', [JsonController::class, 'convertIntoExcel'])->name('upload.json');

});

Route::group(['middleware' => 'web'], function () {

  Route::get('login/github', [App\Http\Controllers\GithubLoginController::class, 'redirectToGithub']);
  Route::get('login/github/callback/', [App\Http\Controllers\GithubLoginController::class, 'handleGithubCallback']);
  
});




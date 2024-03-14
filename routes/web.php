<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::controller(\App\Http\Controllers\Auth\AuthenticateController::class)->group(function (){
   Route::get("login", "login")->name("login");
   Route::post("authenticate", "authenticate")->name("authenticate");
});

Route::middleware("auth:web")->group(function (){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"]);
});

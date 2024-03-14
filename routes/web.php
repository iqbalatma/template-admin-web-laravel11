<?php

use Illuminate\Support\Facades\Route;


Route::middleware("guest")->controller(\App\Http\Controllers\Auth\AuthenticateController::class)->group(function () {
    Route::get("login", "login")->name("login");
    Route::post("authenticate", "authenticate")->name("authenticate");
});

Route::middleware("auth:web")->group(function () {
    Route::post("logout", [\App\Http\Controllers\Auth\AuthenticateController::class, "logout"])->name("logout");

    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"]);

    Route::prefix("management")->name("management.")->group(function () {
        Route::prefix("roles")->name("roles.")->controller(\App\Http\Controllers\Management\RoleController::class)->group(function () {
            Route::get("", "index")->name("index");
            Route::get("{id}", "show")->name("show");
        });

        Route::prefix("roles/permissions")->name("roles.permissions.")->controller(\App\Http\Controllers\Management\PermissionController::class)->group(function (){
           Route::get("", "index")->name("index");
        });
    });
});

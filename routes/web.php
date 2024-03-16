<?php

use Illuminate\Support\Facades\Route;


Route::middleware("guest")->controller(\App\Http\Controllers\Auth\AuthenticateController::class)->group(function () {
    Route::get("login", "login")->name("login");
    Route::post("authenticate", "authenticate")->name("authenticate");
});

Route::middleware("auth:web")->group(function () {
    Route::post("logout", [\App\Http\Controllers\Auth\AuthenticateController::class, "logout"])->name("logout");

    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"]);


    Route::prefix("profiles")->name("profiles.")->controller(\App\Http\Controllers\ProfileController::class)->group(function (){
       Route::get("", "edit")->name("edit");
       Route::patch("", "update")->name("update");
       Route::patch("update-password", "updatePassword")->name("update.password");
    });

    Route::prefix("management")->name("management.")->group(function () {
        Route::prefix("users")->name("users.")->controller(\App\Http\Controllers\Management\UserController::class)->group(function (){
            Route::get("", "index")->name("index");
            Route::get("create", "create")->name("create");
            Route::post("", "store")->name("store");
            Route::get("edit/{id}", "edit")->name("edit");
            Route::patch("{id}", "update")->name("update");
            Route::delete("{id}", "destroy")->name("destroy");
        });

        Route::prefix("roles")->name("roles.")->controller(\App\Http\Controllers\Management\RoleController::class)->group(function () {
            Route::get("", "index")->name("index");
            Route::get("create", "create")->name("create");
            Route::post("", "store")->name("store");
            Route::get("edit/{id}", "edit")->name("edit");
            Route::patch("{id}", "update")->name("update");
            Route::delete("{id}", "destroy")->name("destroy");
        });

        Route::get("/permissions", [\App\Http\Controllers\Management\PermissionController::class, "index"])->name("permissions.index");
    });
});

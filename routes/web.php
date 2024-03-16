<?php

use App\Enums\Permission;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function () {
    Route::controller(\App\Http\Controllers\Auth\AuthenticateController::class)->group(function () {
        Route::get("login", "login")->name("login");
        Route::post("authenticate", "authenticate")->name("authenticate");
    });

    Route::prefix("forgot-password")->name("forgot.password.")->controller(\App\Http\Controllers\Auth\ForgotPasswordController::class)->group(function () {
        Route::get("", "showForgotPassword")->name("show.forgot.password");
        Route::post("", "requestForgotPassword")->name("request.forgot.password");
        Route::get("/reset/{email}/{token}", "showResetPassword")->name("request.reset.password");
        Route::post("/reset", "resetPassword")->name("reset.password");
    });
});


Route::middleware("auth:web")->group(function () {
    Route::post("logout", [\App\Http\Controllers\Auth\AuthenticateController::class, "logout"])->name("logout");

    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"]);


    Route::prefix("profiles")->name("profiles.")->controller(\App\Http\Controllers\ProfileController::class)->group(function () {
        Route::get("", "edit")->name("edit");
        Route::patch("", "update")->name("update");
        Route::patch("update-password", "updatePassword")->name("update.password");
    });

    Route::prefix("management")->name("management.")->group(function () {
        Route::prefix("users")->name("users.")->controller(\App\Http\Controllers\Management\UserController::class)->group(function () {
            Route::get("", "index")->name("index")->middleware("permission:" . Permission::MANAGEMENT_USERS_SHOW->value);
            Route::get("create", "create")->name("create")->middleware("permission:" . Permission::MANAGEMENT_USERS_STORE->value);
            Route::post("", "store")->name("store")->middleware("permission:" . Permission::MANAGEMENT_USERS_STORE->value);
            Route::get("edit/{id}", "edit")->name("edit")->middleware("permission:" . Permission::MANAGEMENT_USERS_UPDATE->value);
            Route::patch("{id}", "update")->name("update")->middleware("permission:" . Permission::MANAGEMENT_USERS_UPDATE->value);
            Route::delete("{id}", "destroy")->name("destroy")->middleware("permission:" . Permission::MANAGEMENT_USERS_DESTROY->value);
        });

        Route::prefix("roles")->name("roles.")->controller(\App\Http\Controllers\Management\RoleController::class)->group(function () {
            Route::get("", "index")->name("index")->middleware("permission:" . Permission::MANAGEMENT_ROLES_SHOW->value);
            Route::get("create", "create")->name("create")->middleware("permission:" . Permission::MANAGEMENT_ROLES_STORE->value);
            Route::post("", "store")->name("store")->middleware("permission:" . Permission::MANAGEMENT_ROLES_STORE->value);
            Route::get("edit/{id}", "edit")->name("edit")->middleware("permission:" . Permission::MANAGEMENT_ROLES_UPDATE->value);
            Route::patch("{id}", "update")->name("update")->middleware("permission:" . Permission::MANAGEMENT_ROLES_UPDATE->value);
            Route::delete("{id}", "destroy")->name("destroy")->middleware("permission:" . Permission::MANAGEMENT_ROLES_DESTROY->value);
        });

        Route::get("/permissions", [\App\Http\Controllers\Management\PermissionController::class, "index"])->name("permissions.index")->middleware("permission:" . Permission::MANAGEMENT_PERMISSIONS_SHOW->value);;
    });


    Route::prefix("tickets")->name("tickets.")->group(function () {
        Route::prefix("periods")->name("periods.")->controller(\App\Http\Controllers\Tickets\PeriodController::class)->group(function () {
            Route::get("", "index")->name("index")->middleware("permission:" . Permission::TICKETS_PERIODS_SHOW->value);
            Route::get("create", "create")->name("create")->middleware("permission:" . Permission::TICKETS_PERIODS_STORE->value);;
            Route::post("", "store")->name("store")->middleware("permission:" . Permission::TICKETS_PERIODS_STORE->value);
            Route::get("edit/{id}", "edit")->name("edit")->middleware("permission:" . Permission::TICKETS_PERIODS_UPDATE->value);
            Route::patch("{id}", "update")->name("update")->middleware("permission:" . Permission::TICKETS_PERIODS_UPDATE->value);
            Route::delete("{id}", "destroy")->name("destroy")->middleware("permission:" . Permission::TICKETS_PERIODS_DESTROY->value);
        });
    });
});

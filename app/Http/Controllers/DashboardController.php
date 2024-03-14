<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        viewShare([
            "title" => "Dashboard",
            "pageTitle" => "Dashboard",
            "pageSubTitle" => "Dashboard",
        ]);

        return response()->view("dashboard.index");
    }
}

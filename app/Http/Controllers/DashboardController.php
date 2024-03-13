<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        viewShare([
            "title" => "Dashboard"
        ]);

        return response()->view("dashboard.index");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

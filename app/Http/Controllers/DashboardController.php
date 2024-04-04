<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * @return Response
     */
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

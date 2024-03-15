<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\Management\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{

    public function index(PermissionService $service): Response
    {
        $response = $service->getAllData();
        viewShare($response);
        return response()->view("management.permissions.index");
    }
}

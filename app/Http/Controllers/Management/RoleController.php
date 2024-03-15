<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\Management\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * @param RoleService $service
     * @return Response
     */
    public function index(RoleService $service):Response
    {
        $response = $service->getAllDataRole();
        viewShare($response);

        return response()->view("management.roles.index");
    }


    /**
     * @param RoleService $service
     * @return Response
     */
    public function create(RoleService $service):Response
    {
        $response = $service->getCreateData();
        viewShare($response);
        return response()->view("management.roles.create");
    }
}

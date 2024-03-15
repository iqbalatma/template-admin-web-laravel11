<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\Roles\StoreRoleRequest;
use App\Http\Requests\Management\Roles\UpdateRoleRequest;
use App\Services\Management\RoleService;
use Illuminate\Http\RedirectResponse;
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


    /**
     * @param RoleService $service
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleService $service, StoreRoleRequest $request): RedirectResponse
    {
        $response = $service->addNewDataRole($request->validated());

        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->route("management.roles.index")->with("success", "Add new data role successfully");
    }

    /**
     * @param RoleService $service
     * @param string $id
     * @return Response|RedirectResponse
     */
    public function edit(RoleService $service, string $id): Response|RedirectResponse
    {
        $response = $service->getEditDataById($id);
        viewShare($response);

        if ($this->isError($response, route("management.roles.index"))) return $this->getErrorResponse();

        return response()->view("management.roles.edit");
    }


    /**
     * @param RoleService $service
     * @param UpdateRoleRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(RoleService $service, UpdateRoleRequest $request, string $id): RedirectResponse
    {
        $response = $service->updateDataRoleById($id, $request->validated());

        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->route("management.roles.index")->with("success", "Update data role successfully");
    }
}

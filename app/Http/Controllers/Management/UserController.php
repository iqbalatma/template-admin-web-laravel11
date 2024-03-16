<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\Users\StoreUserRequest;
use App\Http\Requests\Management\Users\UpdateUserRequest;
use App\Services\Management\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @param UserService $service
     * @return Response
     */
    public function index(UserService $service): Response
    {
        $response = $service->getAllDataPaginated();
        viewShare($response);
        return response()->view("management.users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserService $service): Response
    {
        $response = $service->getCreateData();
        viewShare($response);
        return response()->view("management.users.create");
    }

    /**
     * @param UserService $service
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(UserService $service, StoreUserRequest $request): RedirectResponse
    {
        $response = $service->addNewData($request->validated());
        if ($this->isError($response)) return $this->getErrorResponse();
        return redirect()->route("management.users.index")->with("success", "Add new data user successfully");
    }


    /**
     * @param UserService $service
     * @param string $id
     * @return RedirectResponse|Response
     */
    public function edit(UserService $service, string $id): RedirectResponse|Response
    {
        $response = $service->getEditDataById($id);
        if ($this->isError($response)) return $this->getErrorResponse();
        viewShare($response);
        return response()->view("management.users.edit");
    }

    /**
     * @param UserService $service
     * @param UpdateUserRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UserService $service, UpdateUserRequest $request, string $id): RedirectResponse
    {
        $response = $service->updateDataById($id, $request->validated());
        if ($this->isError($response)) return $this->getErrorResponse();
        return redirect()->route("management.users.index")->with("success", "Update data user successfully");
    }

    /**
     * @param UserService $service
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(UserService $service, string $id)
    {
        $response = $service->deleteDataById($id);
        if ($this->isError($response)) return $this->getErrorResponse();
        return redirect()->route("management.users.index")->with("success", "Delete data user successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\UpdatePasswordRequest;
use App\Http\Requests\Profiles\UpdateProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @param ProfileService $service
     * @return Response
     */
    public function edit(ProfileService $service): Response
    {
        $response = $service->getEditDataById(Auth::id());

        viewShare($response);

        return response()->view("profiles.edit");
    }


    /**
     * @param ProfileService $service
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileService $service, UpdateProfileRequest $request): RedirectResponse
    {
        $response = $service->updateDataById(Auth::id(), $request->validated());
        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->back()->with("success", "Update your profile successfully");
    }


    /**
     * @param ProfileService $service
     * @param UpdatePasswordRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(ProfileService $service, UpdatePasswordRequest $request): RedirectResponse
    {
        $response = $service->updatePassword(Auth::id(), $request->input("old_password"), $request->input("new_password"));
        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->route("profiles.edit");
    }
}

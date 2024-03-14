<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Services\Auth\AuthenticateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AuthenticateController extends Controller
{
    /**
     * @param AuthenticateService $service
     * @return Response
     */
    public function login(AuthenticateService $service): Response
    {
        $response = $service->getLoginData();
        viewShare($response);
        return response()->view("auth.login");
    }


    /**
     * @param AuthenticateService $service
     * @param AuthenticateRequest $request
     * @return RedirectResponse
     */
    public function authenticate(AuthenticateService $service, AuthenticateRequest $request): RedirectResponse
    {
        $response = $service->authenticate($request->validated());

        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->intended('/');
    }
}

<?php

namespace App\Services\Auth;

use App\Contracts\Abstracts\BaseService;
use Illuminate\Support\Facades\Auth;

class AuthenticateService extends BaseService
{
    /**
     * @return string[]
     */
    public function getLoginData(): array
    {
        return [
            "title" => "Login"
        ];
    }

    /**
     * @param array $requestedData
     * @return array
     */
    public function authenticate(array $requestedData):array
    {
        if (Auth::attempt($requestedData)){
            request()->session()->regenerate();
            return ["success" => true];
        }

        return [
            "success" => false,
            "message" => "Email or password is invalid"
        ];
    }
}

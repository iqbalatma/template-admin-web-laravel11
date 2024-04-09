<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

abstract class Controller
{
    protected RedirectResponse $response;

    /**
     * Use to check is response from service error or not
     *
     * @param array $response
     * @param string|null $to
     * @return bool
     */
    protected function isError(array $response, string $to = null): bool
    {
        if (!$response["success"]) {
            $redirect = $to ? redirect()->to($to) : redirect()->back();
            $redirect =  $redirect->withErrors(["errors" => $response["message"]])->withInput();
            $this->setErrorResponse($redirect);
            return true;
        }

        return false;
    }

    /**
     * Use to set data response when response error
     * @param RedirectResponse $response
     * @return void
     */
    protected function setErrorResponse(RedirectResponse $response): void
    {
        $this->response = $response;
    }

    /**
     * Use to redirect when error
     * @return RedirectResponse
     */
    protected function getErrorResponse(): RedirectResponse
    {
        return $this->response;
    }
}

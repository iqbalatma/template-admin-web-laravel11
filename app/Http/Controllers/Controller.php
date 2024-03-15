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
     * @param string|null $redirectTo
     * @return bool
     */
    protected function isError(array $response, string $redirectTo = null): bool
    {
        if (!$response["success"]) {
            if ($redirectTo) {
                $this->setErrorResponse(
                    redirect()->to($redirectTo)->withErrors(["errors" => $response["message"]])->withInput()
                );
            } else {
                $this->setErrorResponse(
                    redirect()->back()->withErrors(["errors" => $response["message"]])->withInput()
                );
            }
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

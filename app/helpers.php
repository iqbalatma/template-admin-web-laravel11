<?php

/**
 * @param array $data
 * @return void
 */
function viewShare(array $data): void
{
    foreach ($data as $key => $value) {
        Illuminate\Support\Facades\View::share($key, $value);
    }
}


/**
 * @param Exception $e
 * @return array
 */
function getDefaultErrorResponse(Exception $e): array
{
    return [
        "success" => false,
        "message" => config('app.env') != 'production' ? $e->getMessage() : 'Something went wrong'
    ];
}

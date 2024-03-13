<?php
function viewShare(array $data): void
{
    foreach ($data as $key => $value) {
        Illuminate\Support\Facades\View::share($key, $value);
    }
}

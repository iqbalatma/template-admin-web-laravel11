<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show(): \Illuminate\Http\Response
    {
        $path = request()->query("path");

        if (!$path) {
            abort(404);
        }

        $file = Storage::get($path);
        if (!$file){
            return Response::make(file_get_contents(public_path("assets/images/placeholder.png")), \Symfony\Component\HttpFoundation\Response::HTTP_OK,[
                'Content-Type' => "image/png",
                'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
            ]);
        }

        $mimeType = Storage::mimeType($path);
        return Response::make($file, \Symfony\Component\HttpFoundation\Response::HTTP_OK, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }
}

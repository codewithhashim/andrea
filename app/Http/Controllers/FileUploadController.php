<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileUploadController extends Controller
{
    public function fileStore(Request $request)
    {
        $this->validate($request, [
            'data' => 'required|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
        ]);
        $file_path = $request->file('data')->store('data', 'public');
        return response('storage/' . $file_path, Response::HTTP_CREATED);
    }
}

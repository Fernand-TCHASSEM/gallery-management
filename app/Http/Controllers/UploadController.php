<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadFileService;
use App\Http\Requests\UploadFileRequest;
use App\Extensions\Controllers\Controller;

class UploadController extends Controller
{
    protected $service;

    function __construct()
    {
        $this->service = new UploadFileService('image');

        $this->middleware('auth:api');
    }

    public function store(UploadFileRequest $request)
    {
        $filePaths = $this->service->makeFromRequest($request);

        return response()->json([
            'code' => self::HTTP_SUCCESS,
            'paths' => $filePaths
        ]);
    }
}

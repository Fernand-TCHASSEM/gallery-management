<?php

namespace App\Services;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;
use Image;

class UploadFileService
{

    function __construct($mimeType = null)
    {
        $this->mimeType = $mimeType;
    }
   

    public function makeFromRequest(UploadFileRequest $request)
    {
        $request->validateByMime($this->mimeType);        

        $files = $request->file('files');

        return $this->store($files);
    }

    public function store (array $files) {
        $filePaths = [];

        for ($i=0, $nbrFiles = count($files); $i < $nbrFiles; $i++) { 
            $path = $files[$i]->store('images');

            $filePaths[] = asset('storage/'.$path);
        }

        return $filePaths;
    }

    public function makeFromBase64Encode(array $bases)
    {
        $filePaths = [];

        Storage::makeDirectory('images');

        for ($i=0, $nbrBases = count($bases); $i < $nbrBases; $i++) { 
            $base = $bases[$i];
            if (!empty($base)) {
                $name = str_random(10).time().'.' . explode('/', explode(':', substr($base, 0, strpos($base, ';')))[1])[1];
                Image::make($base)->save(storage_path('app/public/images/').$name);
            }

            $filePaths[] = asset('storage/images/'.$name);
        }

        return $filePaths;
    }

}
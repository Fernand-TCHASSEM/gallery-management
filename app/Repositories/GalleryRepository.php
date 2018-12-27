<?php

namespace App\Repositories;

use Log;
use App\Models\Gallery;
use App\Bases\Traits\BaseRepository;
use App\Services\UploadFileService;
use function GuzzleHttp\json_decode;

class GalleryRepository
{

    use BaseRepository;

    function __construct(Gallery $gallery)
    {
        $this->model = $gallery;
    }

    public function store($arg)
    {

        $filePaths = (new UploadFileService())->makeFromBase64Encode($arg['pictures']);

        $arg['pictures'] = json_encode($filePaths);

        $gallery = $this->create($arg);

        return $gallery;
    }

    public function modify($arg, $id)
    {

        $filePaths = (new UploadFileService())->makeFromBase64Encode($arg['pictures']);

        $arg['pictures'] = json_encode($filePaths);

        $gallery = $this->update($arg, $id);

        return $gallery;
    }

    public function paginate($params)
    {
        $perPage = 9;
        $orderBy = [];

        if ($params['admin']) {            
            $perPage = 5;
        } else {
            $orderBy = [
                'column' => 'posted_date',
                'direction' => 'DESC'
            ];
        }

        return $this->paginateArrayResults(['*'], [], $orderBy, $perPage);
    }

    public function remove($id)
    {
        $gallery = $this->delete($id);

        return $gallery;
    }

    public function retrieve($id)
    {
        return $this->find($id);
    }

}

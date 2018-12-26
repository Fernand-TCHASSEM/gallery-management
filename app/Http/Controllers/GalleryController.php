<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GalleryRequest;
use App\Repositories\GalleryRepository;
use App\Extensions\Controllers\Controller;

class GalleryController extends Controller
{

    private $repository;

    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->repository = $galleryRepository;

        $this->middleware('auth:api', array('only' => array('store', 'update', 'destroy')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'admin' => false
        ];

        if (Auth::check()) {
            $params['admin'] = true;
        }

        $galleries = $this->repository->paginate($params);

        return response()->json(array_merge([
            'code' => self::HTTP_SUCCESS
        ], $galleries->toArray()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $inputs = $request->all();
        $gallery = $this->repository->store($inputs);

        return response()->json([
            'code' => self::HTTP_CREATED,
            'id' => $gallery->id
        ], self::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = $this->repository->retrieve($id);

        if ($gallery !== null) {
            return response()->json([
                'code' => self::HTTP_SUCCESS,
                'item' => $gallery
            ]);
        }

        return response()->json([
            'code' => 4002,
            'description' => 'This gallery doesn\'t exist.'
        ], self::HTTP_BADREQUEST);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $inputs = $request->validated();
        $gallery = $this->repository->update($inputs, $id);

        return response()->json([
            'code' => self::HTTP_SUCCESS,
            'id' => $gallery->id
        ], self::HTTP_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = $this->repository->remove($id);

        if ($isDelete) {
            return response()->json([
                'code' => self::HTTP_SUCCESS
            ], self::HTTP_SUCCESS);
        }

        return response()->json([
            'code' => 4003,
            'description' => 'This gallery no longer exists.'
        ], self::HTTP_BADREQUEST);

        
    }
}

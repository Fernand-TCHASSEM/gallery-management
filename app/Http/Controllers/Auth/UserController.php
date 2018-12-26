<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Extensions\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(UserRequest $request)
    {
        $inputs = $request->all();

        $response = $this->repository->authenticate($inputs);

        if (!empty($response)) {
            return response()->json(array_merge([
                'code' => self::HTTP_SUCCESS,
            ], $response), self::HTTP_SUCCESS);
        }

        return response()->json([
            'code' => 4001,
            'description' => 'Unauthorised.'
        ], self::HTTP_UNAUTHORIZED);
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(UserRequest $request)
    {
        $inputs = $request->all();

        $response = $this->repository->register($inputs);
        
        return response()->json(array_merge([
            'code' => self::HTTP_CREATED
        ], $response), self::HTTP_CREATED);
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller {
    
    public function __construct() {
        $this->middleware('userApi', ['except' => ['get']]);
    }
    
    public function get (Request $request) {

        if (session()->has('user')) {
            
            session()->flush();
            
            return response()->json([
                'code' => 200
            ], 200);
        }
        
        return response()->json([
            'code' => 4006,
            'description' => 'The session no longer exists.'
        ], 203);
    }
}

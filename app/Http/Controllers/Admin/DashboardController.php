<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    
    public function __construct() {
        $this->middleware('userApi', ['except' => ['get', 'create', 'update']]);
    }
    
    public function get (Request $request) {

        if (session()->has('user')) {

            return view('admin.dashboard');
        }
        
        return redirect('admin');
    }

    public function create (Request $request) {

        if (session()->has('user')) {

            return view('admin.create');
        }
        
        return redirect('admin');
    }
    
}

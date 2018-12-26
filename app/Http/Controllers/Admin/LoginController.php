<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('userApi', ['except' => ['get']]);
    }

    public function get(Request $request)
    {
        if (session()->has('user')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function post(Request $request)
    {
        return response()->json([
            'code' => 200
        ]);
    }
}

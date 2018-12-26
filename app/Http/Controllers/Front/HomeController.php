<?php

namespace App\Http\Controllers\Front;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function get(Request $request)
    {
        return view('front.home');
    }

    public function show(Request $request, $id)
    {
        return view('front.show', [
            'id_gallerie' => $id
        ]);
    }

}

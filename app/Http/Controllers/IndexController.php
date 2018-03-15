<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;


class IndexController extends Controller
{

    use ValidatesRequests;
    public function index(){

        return view('index.index');

    }
}

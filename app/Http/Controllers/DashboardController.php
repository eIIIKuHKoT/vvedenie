<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Configuration;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('dashboard.index');
    }

    public function profile()
    {

        return view('dashboard.profile',[
            'user' => \Auth::user()
        ]);

    }
}

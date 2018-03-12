<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index',[

        ]);
    }

    public function user()
    {

        $users = User::all();

        return view('dashboard.users',[

        ]);
    }
}

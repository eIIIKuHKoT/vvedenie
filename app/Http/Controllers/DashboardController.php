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
        $config = Configuration::getValues(['testss','testss','q']);


        var_dump($config);
        return view('dashboard.index',[

        ]);
    }

    public function users()
    {

        $users = User::all()->toArray();

        return view('dashboard.users',[
            'users' => $users,
            'listing_cols' => array_keys($users[0])
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreUser;
use Mockery\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

        $users = User::all();

        return view('dashboard.users.users',[
            'users' => $users,
            'listing_cols' => array_keys($users->toArray()[0])
        ]);
        //return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect(action("UserController@index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response($user->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profile',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->getPassword() ? bcrypt($request->password) : $user->password
        ]);

        return redirect(redirect()->getUrlGenerator()->previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response('success', 200);
        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mockery\Exception;

class TeamMemberController extends Controller
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
        $members = TeamMember::all();

        return view('dashboard.team-members.team-members',[
            'members' => $members,
            'listing_cols' => (new TeamMember())->getTableColumns()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.team-members.team-member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $path = $file->store('public/members');
            $data['photo'] = \Storage::url($path);
        }
        try {
            TeamMember::create($data);
            return redirect(action('TeamMemberController@index'));
        } catch (Exception $e){
            return response($e->getMessage(), 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        return response($teamMember->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        //
    }
}

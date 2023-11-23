<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('admin.team.index', [
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.team.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
        ]);

        $team = Team::create([
            'name' => $request->name,
        ]);

        $team = $team->users()->attach($request->team_members);

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        $users = User::all();

        return view('admin.team.edit', [
            'team' => $team,
            'users' => $users
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
        ]);

        $team->update([
            'name' => $request->name,
        ]);

        $team = $team->users()->sync($request->team_members);

        return redirect()->route('admin.teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index');
    }
}

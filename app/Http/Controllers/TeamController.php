<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('admin.teams.index', [
            'teams' => $teams,
        ]);
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
        ]);

        $team = Team::firstOrCreate([
            'name' => $request->name,
        ]);


        return redirect()->route('admin.teams.show', $team->id);
    }

    public function show(Team $team)
    {
        return view('admin.teams.show', [
            'team' => $team,
        ]);
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', [
            'team' => $team,
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

        return redirect()->route('admin.teams.show', $team->id);
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index');
    }
}

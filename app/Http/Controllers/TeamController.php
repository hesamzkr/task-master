<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('dashboard.teams', [
            'teams' => $teams,
        ]);
    }
}

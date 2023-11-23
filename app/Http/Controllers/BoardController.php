<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function show(Board $board)
    {
        return view('dashboard.board', ['board' => $board]);
    }
}

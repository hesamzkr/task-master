<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Board $board)
    {
        return view('task.create');
    }
}

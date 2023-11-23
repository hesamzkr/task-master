<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{


    public function create($board_id)
    {
        return view('task.create');
    }
}

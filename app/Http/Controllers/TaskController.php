<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        $team_tasks = auth()->user()->teams->map(function ($team) {
            return $team->tasks;
        })->collapse();

        $tasks = $tasks->merge($team_tasks);

        return view('dashboard.inbox', [
            'tasks' => $tasks
        ]);
    }


    public function create(Board $board)
    {
        $options = collect(Task::$statuses)->map(function ($status) {
            return ['value' => $status, 'label' => $status];
        });

        $assignable_teams = Team::all();
        $assignable_users = User::all();

        return view('task.create', [
            'board' => $board,
            'options' => $options,
            'assignable_teams' => $assignable_teams,
            'assignable_users' => $assignable_users,
        ]);
    }

    public function store(Request $request, Board $board)
    {
        $request->validate([
            'task' => ['required', 'min:3', 'max:20'],
            'status' => ['required', 'in:open,in progress,completed']
        ]);

        $task = Task::create([
            'name' => $request->task,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'board_id' => $board->id,
        ]);

        $task->users()->attach($request->assigned_users);
        $task->teams()->attach($request->assigned_teams);

        $task->save();

        return redirect()->route('dashboard.board.show', $board->id);
    }

    public function edit(Task $task)
    {
        $options = collect(Task::$statuses)->map(function ($status) {
            return ['value' => $status, 'label' => $status];
        });

        $assignable_teams = Team::all();
        $assignable_users = User::all();

        return view('task.edit', [
            'task' => $task,
            'options' => $options,
            'assignable_teams' => $assignable_teams,
            'assignable_users' => $assignable_users,
        ]);
    }


    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task' => ['required', 'min:3', 'max:50'],
            'status' => ['required', 'in:open,in progress,completed'],
        ]);


        $task->update([
            'name' => $request->task,
            'status' => $request->status,
            'deadline' => $request->deadline,
        ]);

        $task->users()->sync($request->assigned_users);
        $task->teams()->sync($request->assigned_teams);

        $task->save();

        return redirect()->route('dashboard.board.show', $task->board->id);
    }

    public function destroy(Task $task)
    {
        $board = $task->board;
        $task->delete();

        return redirect()->route('dashboard.board.show', $board->id);
    }
}

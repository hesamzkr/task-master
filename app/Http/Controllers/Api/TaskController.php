<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\TaskApiRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('board')->paginate(3);

        return TaskResource::collection($tasks);
    }

    public function show(int $task_id)
    {
        $task = Task::find($task_id);
        if ($task == null) {
            return response(['message' => "task with id '{$task_id}' not found"], 404);
        }

        return new TaskResource($task);
    }

    public function store(TaskApiRequest $request)
    {
        $task = Task::create($request->all())->save();

        return new TaskResource($task);
    }

    public function update(TaskApiRequest $request, Task $task)
    {
        $task->update([
            'name' => $request->task,
            'status' => $request->status,
            'deadline' => $request->deadline,
        ]);

        $task->users()->sync($request->assigned_users);
        $task->teams()->sync($request->assigned_teams);

        $task->save();

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'task is deleted']);
    }
}

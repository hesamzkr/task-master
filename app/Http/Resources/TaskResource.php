<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'task' => $this->name,
            'status' => $this->status,
            'board' => new BoardResource($this->board),
            'deadline' => $this->deadline?->format('Y-m-d') ?? 'No deadline',
            'assigned_users' => $this->users,
            'assigned_teams' => $this->teams
        ];
    }
}

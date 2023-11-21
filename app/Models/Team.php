<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Team extends Model
{
    use HasFactory;


    public function tasks(): MorphToMany
    {
        return $this->morphToMany(Task::class, 'assignable');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

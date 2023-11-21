<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'assignable');
    }

    public function teams(): MorphToMany
    {
        return $this->morphedByMany(Team::class, 'assignable');
    }
}

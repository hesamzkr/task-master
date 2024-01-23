<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static array $statuses = [
        'open',
        'in progress',
        'completed',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

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

    public function formattedDeadline()
    {
        if ($this->deadline)
            return Carbon::parse($this->deadline)->format('d/m/Y');
        return null;
    }
}

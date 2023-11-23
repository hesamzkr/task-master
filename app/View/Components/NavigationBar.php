<?php

namespace App\View\Components;

use Closure;
use App\Models\Board;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NavigationBar extends Component
{
    public Collection $boards;
    public int $tasks_number;

    public function __construct()
    {
        $this->boards = Board::all();

        $this->tasks_number = Auth::user()->allTasks()->filter(function ($task) {
            return $task->status != 'completed';
        })->count();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-bar', ['boards' => $this->boards]);
    }
}

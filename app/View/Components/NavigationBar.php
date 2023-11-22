<?php

namespace App\View\Components;

use Closure;
use App\Models\Board;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class NavigationBar extends Component
{
    public Collection $boards;

    public function __construct()
    {
        $this->boards = Board::all();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation-bar', ['boards' => $this->boards]);
    }
}

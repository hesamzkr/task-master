<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudInput extends Component
{
    public string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(string $value = '')
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.crud-input');
    }
}
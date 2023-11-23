<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudInput extends Component
{
    public string $value;
    public string $name;

    /**
     * Create a new component instance.
     */
    public function __construct(string $value = '', string $name)
    {
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.crud-input');
    }
}

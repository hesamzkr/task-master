<?php

namespace App\Livewire;

use Livewire\Component;

class Quote extends Component
{
    public string $category = 'computers';
    public string $author;
    public string $quote;

    public function render()
    {
        return view('livewire.quote');
    }


    public function setCategory()
    {
        $this->category = '';
    }
}

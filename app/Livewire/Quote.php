<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\QuoteService;

class Quote extends Component
{
    public array $categories = [
        'computers',
        'funny',
        'death',
        'success'
    ];
    public string $category;
    public string $author;
    public string $quote;

    public function mount()
    {
        $this->category = $this->categories[0];
        $this->loadQuote();
    }

    public function loadQuote()
    {
        $quote_service = new QuoteService();
        $response = $quote_service->getQuote($this->category)[0];
        $this->author = $response->author;
        $this->quote = $response->quote;
    }

    public function render()
    {
        return view('livewire.quote');
    }

    public function updatedCategory()
    {
        $this->loadQuote();
    }
}

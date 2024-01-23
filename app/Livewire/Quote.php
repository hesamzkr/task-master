<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\QuoteService;

class Quote extends Component
{
    public string $category = 'computers';
    public string $author;
    public string $quote;

    public function mount()
    {
        $this->loadQuote();
    }

    public function loadQuote()
    {
        $quote_service = new QuoteService();
        $response = $quote_service->getQuote($this->category)[0];
        $this->author = $response->author;
        $this->quote = $response->quote;
        // $this->author = "Bill Laswell";
        // $this->quote = "Computers and electronic music are not the opposite of the warm human music. It's exactly the same.";
    }

    public function render()
    {
        return view('livewire.quote');
    }




    public function setCategory()
    {
        $this->category = '';
    }
}

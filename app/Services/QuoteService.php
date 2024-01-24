<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QuoteService
{
    private string $endpoint;
    private string $api_key;

    public function __construct()
    {
        $this->endpoint = config('services.quote.endpoint');
        $this->api_key = config('services.quote.api_key');
    }

    public function getQuote(string $category = 'computers'): array
    {
        $response = Http::acceptJson()->withHeaders(['X-Api-Key' => $this->api_key])->get($this->endpoint, [
            'category' => $category
        ]);
        return json_decode($response->body());
    }
}

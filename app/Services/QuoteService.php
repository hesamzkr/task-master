<?php

use Illuminate\Support\Facades\Http;

class WeatherService
{
    private string $endpoint;

    private string $api_key;


    public function __construct()
    {
        $this->endpoint = config('services.quote.endpoint');
        $this->api_key = config('services.quote.api_key');
    }


    public function getQuote(): object
    {
        $response = Http::acceptJson()->withHeaders(['X-Api-Key' => $this->api_key])->get($this->endpoint, [
            'category' => 'computers'
        ]);
        return json_decode($response->body());
    }
}

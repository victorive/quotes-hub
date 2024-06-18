<?php

namespace App\Services\V1;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class QuoteService
{
    private string $baseUrl;
    private int $quoteLimit;

    public function __construct()
    {
        $this->baseUrl = config('services.kanye_west.base_url');
        $this->quoteLimit = config('services.kanye_west.quote_limit');
    }

    public function fetchQuotes(): array
    {
        $responses = Http::pool(function (Pool $pool) {
            for ($i = 0; $i < $this->quoteLimit; $i++) {
                $pool->get($this->baseUrl);
            }
        });

        return array_map(function ($response) {
            $quote = $response->ok() ? $response->json()['quote'] : null;
            return $quote !== null ? ['quote' => $quote] : null;
        }, $responses);
    }
}

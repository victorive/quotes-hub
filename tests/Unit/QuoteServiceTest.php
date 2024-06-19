<?php

namespace Tests\Unit;

use App\Services\V1\QuoteService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class QuoteServiceTest extends TestCase
{
    private QuoteService $quoteService;

    public function setUp(): void
    {
        parent::setUp();
        $this->quoteService = new QuoteService();
    }

    public function testFetchQuotesReturnsQuotes(): void
    {
        $baseUrl = 'https://example.com';
        Config::set('services.kanye_west.base_url', $baseUrl);
        Config::set('services.kanye_west.quote_limit', 5);

        $counter = 0;

        Http::fake([
            '*' => function () use (&$counter) {
                $counter++;
                switch ($counter) {
                    case 1:
                        return Http::response(['quote' => 'Test quote 1']);
                    case 2:
                        return Http::response(['quote' => 'Test quote 2']);
                    case 3:
                        return Http::response(['quote' => 'Test quote 3']);
                    case 4:
                        return Http::response(['quote' => 'Test quote 4']);
                    case 5:
                        return Http::response(['quote' => 'Test quote 5']);
                }
            },
        ]);

        $quotes = $this->quoteService->fetchQuotes();

        $this->assertCount(5, $quotes);
        $this->assertEquals(['quote' => 'Test quote 1'], $quotes[0]);
        $this->assertEquals(['quote' => 'Test quote 2'], $quotes[1]);
        $this->assertEquals(['quote' => 'Test quote 3'], $quotes[2]);
    }
}

<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetQuotesReturnsJsonResponse(): void
    {
        $response = $this->getJson(route('api.quotes'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data',
            'message',
        ]);
    }
}

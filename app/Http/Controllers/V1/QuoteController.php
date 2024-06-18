<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\V1\QuoteService;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    private QuoteService $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function getQuotes(): JsonResponse
    {
        $quotes = $this->quoteService->fetchQuotes();

        return response()->json(
            [
                'status' => true,
                'data' => $quotes,
                'message' => 'Quotes retrieved successfully',
            ]
        );
    }
}

@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="px-6 md:px-12 py-2 mt-[30px] mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-4 tracking-tight text-gray-900 sm:text-3xl">
                Quotes
            </h2>
            <button id="refresh-button"
                    class="bg-black hover:bg-opacity-70 text-white py-2 px-4 rounded">
                Refresh
            </button>
            <div id="loading-container" class="mt-2"></div>
        </div>
    </section>

    <article class="px-4 py-24 mx-auto max-w-7xl">
        <div class="w-full mx-auto mb-12 text-left md:w-3/4 lg:w-1/2" id="quote-container">
        </div>
    </article>
    
    @push('scripts')
        <script src="{{'js/quotes.js'}}"></script>
    @endpush

@endsection

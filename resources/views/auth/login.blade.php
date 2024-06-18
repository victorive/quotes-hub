@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <section class="bg-gray-50 relative top-14 md:top-[65px] min-h-screen">
        <div class="px-4 py-20 mx-auto">
            <div
                class="w-full px-0 pt-5 pb-6 mx-auto mt-4 mb-0 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg md:px-6 sm:mt-8 sm:mb-5 md:bg-white md:border sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
                <h1 class="mb-5 font-bold text-md sm:text-xl sm:text-center">Login to get started</h1>
                @if (session('error'))
                    <p class="text-sm text-red-500 md:text-center">
                        {{ session('error') }}
                    </p>
                @endif

                <form action="{{ route('auth.login') }}" method="POST" class="pb-1 space-y-4">
                    @csrf

                    <label class="block">
                        <input
                            class="w-full bg-white border rounded block text-sm px-3 py-2 focus:border-[#24207F] @error('email') border-red-500 @enderror"
                            type="email" name="email" placeholder="Email address" value="{{ old('email')}}">
                    </label>
                    @error('email')
                    <span class="block mb-1 text-xs font-medium text-red-500">{{ $message }}</span>
                    @enderror

                    <label class="block">
                        <input
                            class="w-full bg-white border rounded block text-sm px-3 py-2 focus:border-[#24207F] @error('password') border-red-500 @enderror""
                        type="password" name="password" placeholder="Password">
                    </label>
                    @error('password')
                    <span class="block mb-1 text-xs font-medium text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col items-start justify-between sm:items-center sm:flex-row">
                        <input type="submit"
                               class="w-full sm:w-auto mt-5 bg-black rounded-lg text-white text-sm text-center align-middle py-2 px-6 leading-relaxed sm:mt-0 cursor-pointer"
                               value="Login">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

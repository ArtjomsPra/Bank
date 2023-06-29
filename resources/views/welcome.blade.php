@extends('layout')

@section('content')

    <div class="relative flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center sm:flex-row sm:items-start">
                <h1 class="text-3xl text-gray-700 font-semibold mt-4 sm:mt-0 sm:ml-4">Welcome to Online Banking</h1>
            </div>
            <img src="{{ asset('/img/pexels-monstera-5849559.jpg') }}" alt="online banking photo" height="500" width="1000">
        </div>
    </div>

@endsection

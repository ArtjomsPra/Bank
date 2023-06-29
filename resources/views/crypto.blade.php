@extends('layout')

@section('content')

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-3xl text-gray-700 font-semibold">Welcome to crypto currencies</h1>
            </div>

            <div class="mt-4">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cryptocurrencies as $cryptocurrency)
                        <tr>
                            <td>{{ $cryptocurrency->name }}</td>
                            <td>{{ $cryptocurrency->rate }}</td>
                            <td>
                                <a href="{{ route('buy') }}" class="btn btn-primary">Buy</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

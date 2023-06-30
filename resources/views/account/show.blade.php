@extends('layout')

@section('content')

    <h1>My Accounts</h1>

    @foreach ($accounts as $account)
        <div>
            <a href="{{ route('transactions', $account->id) }}"><h2>Account: {{ $account->account }}</h2></a>
            <p>Type: {{ $account->type }}</p>
            <p>Currency: {{ $account->currency }}</p>
            <p>Amount: {{ $account->amount }}</p>

            <a href="{{ route('transfer', $account->id) }}">Make Transfer</a>

            @if ($account->amount == 0)
                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif

        </div>
        <hr>
    @endforeach

@endsection

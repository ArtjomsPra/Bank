@extends('layout')

@section('content')
    <h1>Transfer Funds - Account: {{ $account->account }}</h1>

    @if ($accounts->count() > 0)
        <form action="{{ route('transfer.process', $account->id) }}" method="POST">
            @csrf
            <div>
                <label for="to_account_id">To Account:</label>
                <select name="to_account_id" id="to_account_id">
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->account }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" step="0.01" min="0" required>
            </div>
            <div>
                <label for="transaction_type">Type of transaction:</label>
                <select name="transaction_type" id="transaction_type" required>
                    <option value="Regular">Regular</option>
                    <option value="Express">Express</option>
                    <option value="Super Duper 3000 Speed Transfer">Super Duper 3000 Speed Transfer</option>
                </select>
            </div>
            <div>
                <label for="additional_info">Additional info:</label>
                <input type="text" name="additional_info" id="additional_info" required>
            </div>
            <button type="submit">Transfer</button>
        </form>
    @else
        <p>No eligible accounts for transfer.</p>
    @endif
@endsection

@extends('layout')

@section('content')
    <h1>Transaction History for Account: {{ $account->account }}</h1>

    <table>
        <thead>
        <tr>
            <th>Transaction ID</th>
            <th>From Account</th>
            <th>To Account</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Transaction Type</th>
            <th>Additional Info</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->fromAccount->account }}</td>
                <td>{{ $transaction->toAccount->account }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->currency }}</td>
                <td>{{ $transaction->transaction_type }}</td>
                <td>{{ $transaction->additional_info }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

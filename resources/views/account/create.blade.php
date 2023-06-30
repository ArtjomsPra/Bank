@extends('layout')

@section('content')

        <h1>Create Account</h1>

        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="type">Account Type:</label>
            <select name="type" id="type">
                <option value="regular">Regular</option>
                <option value="savings">Savings</option>
            </select>

            <label for="currency">Currency:</label>
            <input type="text" name="currency" id="currency">

            <label for="amount">Amount:</label>
            <input type="text" name="amount" id="amount">

            <button type="submit">Create Account</button>
        </form>

@endsection



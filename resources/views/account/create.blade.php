@extends('layout')

@section('content')

        <h1>Create Account</h1>

        <form action="{{ route('accounts.store') }}" method="POST">
            @csrf

            <label for="type">Account Type:</label>
            <select name="type" id="type">
                <option value="regular">Regular</option>
                <option value="savings">Savings</option>
            </select>

            <label for="currency">Currency:</label>
            <input type="text" name="currency" id="currency">

            <button type="submit">Create Account</button>
        </form>

@endsection



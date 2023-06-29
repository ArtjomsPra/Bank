<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::where('user_id', Auth::id())->get();
        return view('show', [
            'accounts' => $accounts
        ]);
    }


    public function create()
    {
        return view('account.create');
    }


    public function store()
    {
       request()->validate([
            'type' => 'required',
            'currency' => 'required',
            'amount' => 'required|numeric',
        ]);

       $account = (new Account())->fill([
            'account' => 'LV' . rand(00,99) . 'ARPB' . rand(0000000000, 9999999999),
            'type' => request('type'),
            'currency' => request('currency'),
            'amount' => 0,
       ]);
        $account->user()->associate(Auth::user());
        $account->save();
        return redirect()->route('/')->with('success', 'Account was created Successfully');
    }


    public function show($id)
    {


    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}

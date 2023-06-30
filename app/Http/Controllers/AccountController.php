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
        return view('account.show', [
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
            'amount' => request('amount'),
       ]);
        $account->user()->associate(Auth::user());
        $account->save();
        return redirect()->route('accounts.show')->with('success', 'Account was created successfully');
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
        $account = Account::findOrFail($id);

        if ($account->amount == 0) {
            $account->delete();
            return redirect()->back()->with('success', 'Account was deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Account cannot be deleted if balance is not 0');
        }
    }
}

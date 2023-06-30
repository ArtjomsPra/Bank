<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transactions($id)
    {
        $account = Account::findOrFail($id);
        $transactions = Transaction::where('account_id', $account->id)->get();

        return view('account.transactions', [
            'account' => $account,
            'transactions' => $transactions
        ]);
    }

    public function transfer($id)
    {
        $account = Account::findOrFail($id);
        $accounts = Account::where('user_id', Auth::id())->where('id', '!=', $account->id)->get();

        return view('account.transfer', [
            'account' => $account,
            'accounts' => $accounts
        ]);
    }

    public function processTransfer(Request $request, $id)
    {
        $request->validate([
            'to_account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $fromAccount = Account::findOrFail($id);
        $toAccount = Account::findOrFail($request->input('to_account_id'));

        if ($fromAccount->amount < $request->input('amount')) {
            return redirect()->back()->with('error', 'Insufficient funds for the transfer');
        }

        $transaction = new Transaction([
            'account_id' => $fromAccount->id,
            'to_account_id' => $toAccount->id,
            'from_user_id' => Auth::id(),
            'to_user_id' => $toAccount->user_id,
            'amount' => $request->input('amount'),
            'currency' => $fromAccount->currency,
            'transaction_type' => $request->input('transaction_type'),
            'additional_info' => $request->input('additional_info'),
        ]);
        $transaction->save();

        $fromAccount->amount -= $request->input('amount');
        $fromAccount->save();

        $toAccount->amount += $request->input('amount');
        $toAccount->save();

        return redirect()->route('account.transactions', $fromAccount->id)->with('success', 'Transfer successful');
    }
}

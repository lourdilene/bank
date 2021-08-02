<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Withdraw;

class TransactionController extends Controller
{
    public function withdraw(Request $request)
    {
        $account = Account::where('number', '=', $request->accountNumber)->firstOrFail();
        $transaction = new Withdraw();
        return $transaction->executeTransaction($account, $request->amount);
    }

    public function deposit(Request $request)
    {
        $account = Account::where('number', '=', $request->accountNumber)->firstOrFail();
        $transaction = new Deposit();
        return $transaction->executeTransaction($account, $request->amount);
    }

    public function balance(Request $request)
    {
        $account = new Account();
        $account = Account::find($request->accountNumber);

        return $account->balance;
    }
}

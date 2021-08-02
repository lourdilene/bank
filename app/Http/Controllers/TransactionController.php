<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Withdraw;

class TransactionController extends Controller
{
    public function withdraw(Request $request)
    {
        $account = Account::find($request->accountNumber);
        $transaction = new Withdraw();
        return $transaction->executeTransaction($account, $request->amount);        
    }

    public function balance(Request $request)
    {
        //$account = new Account();
        //$account = Account::find($request->accountNumber);
        //return $account->balance;
        //$transaction = new Withdraw();
        return $this->balance;

        //return $account->toWithdraw($request->accountNumber, $request->amount);
    }
}
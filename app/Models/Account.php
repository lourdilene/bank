<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $timestamps = false;
    protected $fillable = ['number','balance'];

    public function toWithdraw(int $accountNumber, float $amount)
    {
        $account = Account::find($accountNumber);

        if ($amount > $account->balance) {
            return response()->json(['Erro'=>'Saldo Insuficiente'],404);
        }

        $account->balance -= $amount;

        $account->update();

        return response()->json(['data'=>['withdraw'=>$account]],200);
    }

    public function toDeposit(int $accountNumber, float $amount)
    {
        $account = Account::find($accountNumber);

        $account->balance += $amount;

        $account->update();

        return $account;
    }
}
?>

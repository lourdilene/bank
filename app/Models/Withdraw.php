<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Transaction
{
    protected $name = 'withdraw';

    public function balanceCalculate($account, $amount)
    {
        return $account->balance -= $amount;
    }
}
?>

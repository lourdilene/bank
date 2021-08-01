<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Transaction
{
    protected $name = 'deposit';

    public function balanceCalculate($account, $amount)
    {
        return $account->balance += $amount;
    }
}
?>

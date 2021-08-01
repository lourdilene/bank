<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Transaction extends Model
{
    protected $name;
    
    abstract public function balanceCalculate(Account $account, float $amount);

    public function executeTransaction(Account $account, float $amount){        

        $this->balanceCalculate($account, $amount);

        $account->update();

        return response()->json(['data'=>[$this->name=>$account]],200);

    }
}
?>

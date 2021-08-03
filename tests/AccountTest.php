<?php

use App\Models\Account;
use App\Models\Deposit;
use App\Models\Withdraw;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AccountTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testAccountWithdraw()
    {
        $parameters = [
            'accountNumber' => '1221',
            'amount' => '10',
        ];

        $response = $this->call('POST', '/api/withdraw', $parameters);

        $this->assertEquals(200, $response->status());

        $this->seeJsonStructure(
            ['data' =>
                [
                    'withdraw' =>
                    [
                        'id',
                        'number',
                        'balance'
                    ]
                ]
            ]
        );
    }

    public function testWithdraw(){
        $account = Account::create([
            'number' => '3434',
            'balance' => '100.00'
        ]);

        $transaction = new Withdraw();
        $transaction->executeTransaction($account, 50.0);
        $this->assertEquals($account->balance, 50.0);
    }

    public function testDeposit(){
        $account = Account::create([
            'number' => '3535',
            'balance' => '100.00'
        ]);

        $transaction = new Deposit();
        $transaction->executeTransaction($account, 50.0);
        $this->assertEquals($account->balance, 150.0);
    }

    public function testAccountDeposit()
    {
        $parameters = [
            'accountNumber' => '1221',
            'amount' => '10',
        ];

        $response = $this->call('POST', '/api/deposit', $parameters);

        $this->assertEquals(200, $response->status());

        $this->seeJsonStructure(
            ['data' =>
                [
                    'deposit' =>
                    [
                        'id',
                        'number',
                        'balance'
                    ]
                ]
            ]
        );
    }
}

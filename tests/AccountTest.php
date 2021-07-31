<?php

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
            'accountNumber' => '1',
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

    public function testAccountDeposit()
    {
        $parameters = [
            'accountNumber' => '1',
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

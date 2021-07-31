<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->group(['prefix' => 'accounts'], function() use ($router){
        $router->get('','AccountController@index');
        $router->get('{id}','AccountController@show');
        $router->post('','AccountController@store');
        $router->post('','AccountController@sacar');

        $router->get('{transactionId}/trasactions','TransactionsController@searchBySeries');
    });
    $router->group(['prefix' => 'transactions'], function() use ($router){
        $router->get('','TransactionController@index');
    });
});

$router->post('api/login','TokenController@generateToken');
$router->post('api/transfer','AccountController@transfer');
$router->post('api/withdraw','AccountController@withdraw');
$router->post('api/deposit','AccountController@deposit');

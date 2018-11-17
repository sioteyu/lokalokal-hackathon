<?php

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

	$router->group(['middleware' => 'auth'], function () use ($app) {

	$router->POST('login', ['uses' => 'AuthController@Authenticate']);

	$router->GET('users', ['uses' => 'UserController@index']);

	$router->POST('users', ['uses' => 'UserController@store']);

	$router->GET('users/{id}', ['uses' => 'UserController@show']);

	$router->PUT('users/{id}', ['uses' => 'UserController@update']);

	$router->PATCH('users/{id}', ['uses' => 'UserController@update']);

	$router->DELETE('users/{id}', ['uses' => 'UserController@destroy']);


	$router->GET('address', ['uses' => 'AddressController@index']);

	$router->POST('address', ['uses' => 'AddressController@store']);

	$router->GET('address/{id}', ['uses' => 'AddressController@show']);

	$router->PUT('address/{id}', ['uses' => 'AddressController@update']);

	$router->PATCH('address/{id}', ['uses' => 'AddressController@update']);

	$router->DELETE('address/{id}', ['uses' => 'AddressController@destroy']);


	$router->GET('products', ['uses' => 'ProductController@index']);

	$router->POST('products', ['uses' => 'ProductController@store']);

	$router->GET('products/{id}', ['uses' => 'ProductController@show']);

	$router->PUT('products/{id}', ['uses' => 'ProductController@update']);

	$router->PATCH('products/{id}', ['uses' => 'ProductController@update']);

	$router->DELETE('products/{id}', ['uses' => 'ProductController@destroy']);


	$router->GET('bean', ['uses' => 'BeanController@index']);

	$router->POST('bean', ['uses' => 'BeanController@store']);

	$router->GET('bean/{id}', ['uses' => 'BeanController@show']);

	$router->PUT('bean/{id}', ['uses' => 'BeanController@update']);

	$router->PATCH('bean/{id}', ['uses' => 'BeanController@update']);

	$router->DELETE('bean/{id}', ['uses' => 'BeanController@destroy']);


	$router->GET('transaction', ['uses' => 'TransactionHistoryController@index']);

	$router->POST('transaction', ['uses' => 'TransactionHistoryController@store']);

	$router->GET('transaction/{id}', ['uses' => 'TransactionHistoryController@show']);

	$router->DELETE('transaction/{id}', ['uses' => 'TransactionHistoryController@destroy']);


	$router->GET('items', ['uses' => 'TransactionItemController@index']);

	$router->POST('items', ['uses' => 'TransactionItemController@store']);

	$router->GET('items/{id}', ['uses' => 'TransactionItemController@show']);

	$router->DELETE('items/{id}', ['uses' => 'TransactionItemController@destroy']);

});



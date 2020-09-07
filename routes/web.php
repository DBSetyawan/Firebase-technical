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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');
     //product routes
    $router->get('products', 'ProductsController@index');
    $router->get('products/{id}', 'ProductsController@show');
    $router->put('products/{id}', 'ProductsController@update');
    $router->post('products', 'ProductsController@store');
    $router->delete('products/{id}', 'ProductsController@destroy');
    $router->get('firebase/product', 'FirebaseController@add');
    $router->post('firebase/setProduct', 'FirebaseController@firestoreSet');

 });






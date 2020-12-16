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

// unsecure routes
// $router->group(['prefix' => 'api'], function () use ($router) {
//     $router->get('/users',['uses' => 'UserController@getUsers']);
// });

//with authentication using middleware
$router->group(['middleware' => 'client.credentials'], function() use ($router){

    // site 1 routes
    $router->get('/users1', 'User1Controller@index');//get

    $router->post('/users1', 'User1Controller@addUser');//create
    $router->get('/users1/{id}', 'User1Controller@showUser');//get user base on id
    $router->put('/users1/{id}', 'User1Controller@updateUsers');//Update all fields
    $router->patch('/users1/{id}', 'User1Controller@updateUsers');//update specific field
    $router->delete('/users1/{id}', 'User1Controller@removeUser');//get

    // site 2 routes
    $router->get('/users2', 'User2Controller@index');//get
    $router->post('/users2', 'User2Controller@addUser');//create
    $router->get('/users2/{id}', 'User2Controller@showUser');//get user base on id
    $router->put('/users2/{id}', 'User2Controller@updateUsers');//Update all fields
    $router->patch('/users2/{id}', 'User2Controller@updateUsers');//update specific field
    $router->delete('/users2/{id}', 'User2Controller@removeUser');//get
});


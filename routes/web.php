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

$router->group(['prefix'=>'api'],function() use ($router){

    $router->post('user',['uses'=>'UsersController@create']);
    $router->get('users',['uses'=>'UsersController@index']);
    
    $router->post('department',['uses'=>'DepartmentController@create']);
    $router->get('departments',['uses'=>'DepartmentController@index']); 
    $router->put('department/{id}',['uses'=>'DepartmentController@update']);
    $router->delete('department/{id}',['uses'=>'DepartmentController@delete']);
    


});


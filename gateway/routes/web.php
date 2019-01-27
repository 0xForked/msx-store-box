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

$router->get('/', 'ExampleController@index');

// login
// dia diluar group /api/v1
// dia abis login otomatis mo ba create oauth_client


// cara akses ke /api/v1
// pertama pake method post ke oauth/token
// dengan body/parameter grant_type=client_credentials, client_id dng client_secret
// abis itu nanti klo sukses mo dapa token_type, expire, access_token
// data akses tadi (accesstoken) pake di headers dengan nama Authorization dpe isi access_token

$router->group([
    'prefix' => 'api/v1',
    'middleware' => 'client.credentials'
], function() use ($router){

    $router->get('/ping', function () {
        return "pong";
    });

    $router->get('/authors', 'AuthorController@list');
    $router->get('/authors/{id}', 'AuthorController@detail');
    $router->post('/authors', 'AuthorController@store');
    $router->put('/authors/{id}', 'AuthorController@update');
    $router->delete('/authors/{id}', 'AuthorController@destroy');

    $router->get('/categories', 'CategoryController@list');
    $router->get('/categories/{id}', 'CategoryController@detail');
    $router->post('/categories', 'CategoryController@store');
    $router->put('/categories/{id}', 'CategoryController@update');
    $router->delete('/categories/{id}', 'CategoryController@destroy');

    $router->get('/products', 'ProductController@list');
    $router->get('/products/{id}', 'ProductController@detail');
    $router->post('/products', 'ProductController@store');
    $router->put('/products/{id}', 'ProductController@update');
    $router->delete('/products/{id}', 'ProductController@destroy');

});


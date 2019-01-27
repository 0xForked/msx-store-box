<?php

/*
|----------------------------------------------------
| Routing sytem                                      |
|----------------------------------------------------
*/


    $app->get('/', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('Hello from product-service');
    });

    $app->get('/ping', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('PONG');
    });

    $app->get('/products', 'ProductController:list')->setName('product.all');
    $app->get('/products/{id}', 'ProductController:detail')->setName('product.detail');
    $app->post('/products', 'ProductController:store')->setName('product.store');
    $app->put('/products/{id}', 'ProductController:update')->setName('product.update');
    $app->delete('/products/{id}', 'ProductController:destroy')->setName('product.delete');

    $app->get('/authors', 'AuthorController:list')->setName('author.all');
    $app->get('/authors/{id}', 'AuthorController:detail')->setName('author.detail');
    $app->post('/authors', 'AuthorController:store')->setName('author.store');
    $app->put('/authors/{id}', 'AuthorController:update')->setName('author.update');
    $app->delete('/authors/{id}', 'AuthorController:destroy')->setName('author.delete');

    $app->get('/categories', 'CategoryController:list')->setName('category.all');
    $app->get('/categories/{id}', 'CategoryController:detail')->setName('category.detail');
    $app->post('/categories', 'CategoryController:store')->setName('category.store');
    $app->put('/categories/{id}', 'CategoryController:update')->setName('category.update');
    $app->delete('/categories/{id}', 'CategoryController:destroy')->setName('category.delete');
<?php

/*
|----------------------------------------------------
| Routing sytem                                      |
|----------------------------------------------------
*/

    $app->get('/', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('Hello from order-service');
    });

    $app->get('/ping', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('PONG');
    });

    $app->get('/order/{id}', 'OrderController:show')->setName('order.show');
    $app->post('/order', 'OrderController:make')->setName('order.make');

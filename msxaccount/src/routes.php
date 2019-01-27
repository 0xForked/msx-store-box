<?php

/*
|----------------------------------------------------
| Routing sytem                                      |
|----------------------------------------------------
*/


    $app->get('/', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('Hello from account-service');
    });

    $app->get('/ping', function($request, $response) {
        return $response->withHeader('Content-Type', 'text/plain')->write('PONG');
    });
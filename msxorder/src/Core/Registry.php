<?php

/*
|----------------------------------------------------
| Controller                                        |
|----------------------------------------------------
*/

    $container['OrderController'] = function ($container) {
        return new \App\Http\Controllers\OrderController($container);
    };

/*
|----------------------------------------------------
| Middleware                                        |
|----------------------------------------------------
*/

    $app->add(new \App\Http\Middlewares\AccessLogMiddleware($container));
    $app->add(new \App\Http\Middlewares\AuthorizationMiddleware($container));

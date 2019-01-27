<?php

/*
|----------------------------------------------------
| Controller                                        |
|----------------------------------------------------
*/

    $container['AuthorController'] = function ($container) {
        return new \App\Http\Controllers\Data\AuthorController($container);
    };

    $container['ProductController'] = function ($container) {
        return new \App\Http\Controllers\Data\ProductController($container);
    };

    $container['CategoryController'] = function ($container) {
        return new \App\Http\Controllers\Data\CategoryController($container);
    };

/*
|----------------------------------------------------
| Middleware                                        |
|----------------------------------------------------
*/

    $app->add(new \App\Http\Middlewares\AccessLogMiddleware($container));
    $app->add(new \App\Http\Middlewares\AuthorizationMiddleware($container));

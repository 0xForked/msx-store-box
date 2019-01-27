<?php

/*
|----------------------------------------------------
| Register The 3rd Party Library                    /
|----------------------------------------------------
*/
    require_once __DIR__ . ('/../../vendor/autoload.php');

/*
|----------------------------------------------------
| App Helper                                        /
|----------------------------------------------------
*/
    require_once __DIR__ . '/Helpers/EnvHelper.php';
    require_once __DIR__ . '/Helpers/DumpHelper.php';
    require_once __DIR__ . '/Helpers/StringHelper.php';

/*
|----------------------------------------------------
| This Application Setting                          /
|----------------------------------------------------
*/
    $settings = require __DIR__ . '/Settings.php';
    $app = new \Slim\App($settings);

/*
|----------------------------------------------------
| Dependencies File                                 |
|----------------------------------------------------
*/
    require __DIR__  . ('/Dependencies.php');
    require __DIR__  . ('/Registry.php');

/*
|----------------------------------------------------
| Routers File                                      |
|----------------------------------------------------
*/
    require __DIR__  . ('/../routes.php');
<?php

return [
    'settings' => [
        'env' => \Lib\Framework\App::DEVELOPMENT,
        'addContentLengthHeader' => false,
        // default timezone & locale
        'timezone' => 'Europe/Lisbon',
        'locale' => 'pt_PT',
        // Only set this if you need access to route within middleware
        'determineRouteBeforeAppMiddleware' => false,
        // log file path
        'log' => [
            // log file path
            'file' => STORAGE_PATH . "logs" . DS . "app_" . date('Ymd') . ".log",
        ],
        // template folders
        'templates' => [
            'error' => RESOURCES_PATH . "views" . DS . "http" . DS . "error",
            'console' => RESOURCES_PATH . "views" . DS . "console",
            'site' => RESOURCES_PATH . "views" . DS . "http" . DS . "site",
            'mail' => RESOURCES_PATH . "views" . DS . "mail",
        ],
        // setting for twig extension
        'twig' => [
            'cache' => STORAGE_PATH . 'twig',
            'debug' => true,
            'auto_reload' => true,
        ]
    ],
    // add your service providers here
    'providers' => [

    ],
    // add your middleware here
    'middleware' => [

    ],

];

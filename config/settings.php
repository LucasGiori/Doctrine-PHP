<?php

define('APP_ROOT', __DIR__ . "/../");

return [
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,
        'doctrine' => [
            'dev_mode' => true,
            'cache_dir' => null,// APP_ROOT . 'var/doctrine',
            'metadata_dirs' => [APP_ROOT . 'src/Entity'],
            'proxyDir' => null,
            'sumpleAnnotationReader' => false,
            'connection' => [
                'driver' => 'pdo_pgsql',
                'host' => $_ENV['DB_HOST'],
                'port' => $_ENV['DB_PORT'],
                'dbname' => $_ENV['DB_DATABASE'],
                'user' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'charset' => 'UTF8'
            ]
        ]
    ]
];

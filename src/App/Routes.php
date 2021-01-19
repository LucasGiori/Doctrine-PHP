<?php

declare(strict_types=1);

namespace App\App;

use App\Handler\User\GetUserById;
use Slim\Routing\RouteCollectorProxy;


$app->group('/usuarios', function (RouteCollectorProxy $group) {  
    $group->get('[/{id}]', GetUserById::class);//$container->get('em')->getRespository(Usuario::class)
});


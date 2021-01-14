<?php

declare(strict_types=1);

namespace App\App;

use App\Entity\Usuario;
use App\Handler\Usuario\GetUserById;
use Slim\Routing\RouteCollectorProxy;

$app->group('/usuarios', function (RouteCollectorProxy $group) {  
    $group->get('[/{id}]', new GetUserById($container->get('em')->get));//$container->get('em')->getRespository(Usuario::class)
});


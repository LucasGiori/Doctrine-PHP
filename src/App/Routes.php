<?php

declare(strict_types=1);

namespace App\App;

use App\Handler\User\{GetUserById,CreateUser};
use Slim\Routing\RouteCollectorProxy;


$app->group('/usuarios', function (RouteCollectorProxy $group) {  
    $group->get('[/{id}]', GetUserById::class);
    $group->post('[/]', CreateUser::class);
});


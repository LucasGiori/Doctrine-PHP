<?php

declare(strict_types=1);

namespace App\App;

use App\Handler\User\{GetUserById,CreateUser};
use App\Handler\UserType\{GetUserTypeById,CreateUserType};
use Slim\Routing\RouteCollectorProxy;


$app->group('/api', function (RouteCollectorProxy $group) { 
    
    $group->group('/users', function (RouteCollectorProxy $group) { 
        $group->get('[/{id}]', GetUserById::class);
        $group->post('[/]', CreateUser::class);

        //Route list Types of users
        $group->get('/types/{id}', GetUserTypeById::class);
        $group->post('/types[/]', CreateUserType::class);
        
    });
   
    
});


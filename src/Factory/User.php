<?php

declare(strict_types = 1);

namespace App\Factory;

use App\Entity\User as EntityUser;
use App\Repository\User as UserRepository;
use App\Service\User as UserService;
use Doctrine\ORM\EntityManager;

final class User
{ 
    public static function create(EntityManager $entityManager,EntityUser $user)
    {
        $userRepository = new UserRepository($entityManager);
        $userService = (new UserService($userRepository))->create($user);
        return $userService;
    }
}
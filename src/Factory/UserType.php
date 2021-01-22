<?php

declare(strict_types = 1);

namespace App\Factory;

use App\Entity\UserType as EntityUserType;
use App\Repository\UserType as UserTypeRepository;
use App\Service\UserType as UserTypeService;
use Doctrine\ORM\EntityManager;

final class UserType
{ 
    public static function create(EntityManager $entityManager,EntityUserType $usertype)
    {
        $userTypeRepository = new UserTypeRepository($entityManager);
        $userTypeService = (new UserTypeService($userTypeRepository))->create($usertype);
        return $userTypeService;
    }

    public static function getUserTypeById(EntityManager $entityManager,int $idusertype):EntityUserType
    {
        $userTypeRepository = new UserTypeRepository($entityManager);
        $userTypeService = (new UserTypeService($userTypeRepository))->getUserTypeById($idusertype);
        return $userTypeService;
    }
}
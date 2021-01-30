<?php

declare(strict_types = 1);

namespace App\Factory;

use App\Entity\UserType as EntityUserType;
use App\Repository\UserType as UserTypeRepository;
use App\Service\UserType as UserTypeService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validation;

final class UserType
{ 
    public static function create(EntityManager $entityManager,EntityUserType $usertype)
    {
        // $validator = Validation::createValidator();
        // $errors = $validator->validate($usertype);
        
        // var_dump($errors);
        // exit;
        // if (count($errors) > 0) {
        // }
        $userTypeRepository = new UserTypeRepository($entityManager);
        (new UserTypeService($userTypeRepository))->create($usertype);
    }

    public static function getUserTypeById(EntityManager $entityManager,int $idusertype):EntityUserType
    {
        $validator = Validation::createValidator();
        $userTypeRepository = new UserTypeRepository($entityManager, $validator);
        $userTypeService = (new UserTypeService($userTypeRepository))->getUserTypeById($idusertype);
        return $userTypeService;
    }
}
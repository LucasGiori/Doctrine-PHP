<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserType as EntityUserType;
use Doctrine\ORM\EntityManager;
use App\InterfaceRepository\UserType as InterfaceUserTypeRespository;

final class UserType implements InterfaceUserTypeRespository
{
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUserTypeById(int $idusertype): EntityUserType
    {
        $usertype = $this->entityManager->getRepository(EntityUserType::class)->find($idusertype);
        return $usertype;
        
    }

    public function create(EntityUserType $usertype): void
    {
        $this->entityManager->persist($usertype);
        $this->entityManager->flush();
    }
}
<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User as EntityUser;
use Doctrine\ORM\EntityManager;
use App\InterfaceRepository\User as InterfaceUserRepository;

final class User implements InterfaceUserRepository
{
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUserById(int $iduser): EntityUser
    {
       return $this->entityManager->getRepository(EntityUser::class)->find($iduser);
    }

    public function create(EntityUser $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
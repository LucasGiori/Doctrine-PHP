<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User as EntityUser;
use Doctrine\ORM\EntityManager;
use App\InterfaceRepository\User as InterfaceUserRepository;

final class User implements InterfaceUserRepository
{
    private $usuarioRepository;
    
    public function __construct(
       EntityManager $entityManager,       
    )
    {
        $this->usuarioRepository = $entityManager->getRepository(EntityUser::class);
    }

    public function getUserById(int $idusuario): EntityUser
    {
        return $this->usuarioRepository->findBy([
            'idusuario' => $idusuario
        ]);
    }
}
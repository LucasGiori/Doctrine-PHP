<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserType as EntityUserType;
use Doctrine\ORM\EntityManager;
use App\InterfaceRepository\UserType as InterfaceUserTypeRespository;
use TypeError;
use Exception;

final class UserType implements InterfaceUserTypeRespository
{
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUserTypeById(int $idusertype): EntityUserType
    {
        try{
            return $this->entityManager->getRepository(EntityUserType::class)->find($idusertype);
        }catch(TypeError $e){
            throw new Exception("Não existe nenhum tipo de usuário com está identificação!");
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function create(EntityUserType $usertype): void
    {
        $this->entityManager->persist($usertype);
        $this->entityManager->flush();
    }
}
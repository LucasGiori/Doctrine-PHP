<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserType as EntityUserType;
use App\InterfaceRepository\UserType as InterfaceUserTypeRespository;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Exception as DBALException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
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
        try{
            $this->entityManager->persist($usertype);
            $this->entityManager->flush();
        }catch(DBALException\InvalidArgumentException $e){
            throw new Exception('Argumento inválido');
        }catch(DBALException\NotNullConstraintViolationException $e){
            throw new Exception('A descrição não poder ser nula, verifique os parâmetros e tente novamente!');
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}
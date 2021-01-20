<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User as EntityUser;
use App\InterfaceRepository\User as InterfaceUserRepository;

class User
{
    protected InterfaceUserRepository $interfaceUser;
    
    public function __construct(InterfaceUserRepository $interfaceUser)
    {
        $this->interfaceUser = $interfaceUser;
    }

    public function getUserById(int $iduser):EntityUser
    {
        return $this->interfaceUser->getUserById($iduser);
    }

    public function create(EntityUser $user):void 
    {
        $this->interfaceUser->create($user);
    }
}
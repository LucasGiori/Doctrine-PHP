<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\UserType as EntityUserType;
use App\InterfaceRepository\UserType as InterfaceUserTypeRepository;

class UserType
{
    protected InterfaceUserTypeRepository $interfaceUser;
    
    public function __construct(InterfaceUserTypeRepository $interfaceUserType)
    {
        $this->interfaceUserType = $interfaceUserType;
    }

    public function getUserTypeById(int $idusertype):EntityUserType
    {
        return $this->interfaceUserType->getUserTypeById($idusertype);
    }

    public function create(EntityUserType $user):void 
    {
        $this->interfaceUserType->create($user);
    }
}
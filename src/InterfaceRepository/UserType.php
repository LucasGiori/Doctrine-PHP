<?php

declare(strict_types=1);

namespace App\InterfaceRepository;

use App\Entity\UserType as EntityUserType;

interface UserType
{
    public function getUserTypeById(int $idusertype):EntityUserType;
    public function create(EntityUserType $user):void;
}
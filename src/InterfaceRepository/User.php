<?php

declare(strict_types=1);

namespace App\InterfaceRepository;

use App\Entity\User as EntityUser;

interface User
{
    public function getUserById(int $iduser):EntityUser;
    public function create(EntityUser $user):void;
}
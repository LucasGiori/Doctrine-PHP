<?php

declare(strict_types=1);

namespace App\Service;

use App\InterfaceRepository\User as InterfaceUserRepository;

class User
{
    public function __construct(
        public InterfaceUserRepository $userInterface,
        $interfaceUser
    )
    {
        $this->userInterface = $interfaceUser;
    }
}
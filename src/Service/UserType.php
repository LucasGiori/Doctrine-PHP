<?php

declare(strict_types=1);

namespace App\Service;

use App\InterfaceRepository\UserType as InterfaceUserTypeRepository;

class UserType
{
    public function __construct(
        public InterfaceUserTypeRepository $userTypeInterface,
        $interfaceUserTypeRepository
    )
    {
        $this->userTypeInterface = $interfaceUserTypeRepository;
    }
}
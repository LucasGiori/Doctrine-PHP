<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** 
 * @ORM\Entity
 * @ORM\Table(name="usertype")
*/
class UserType
{    
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer",nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $idusertype;

    /**
     * @ORM\Column(type="string",length=140)
     * @Assert\NotBlank(message="Falhar")
     */
    private string $description;

    public function getIdusertype():int
    {
        return $this->idusertype;
    }
    public function getDescription():string
    {
        return $this->description;
    }
    public function setDescription(string $description):void
    {
        $this->description = $description;
    }
}

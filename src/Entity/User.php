<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer",nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $iduser;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumn(name="idtipousuario", referencedColumnName="idusertype")
     */
    private int $idusertype;


    public function getIduser():int
    {
        return $this->iduser;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function setName(string $name):void
    {
        $this->name = $name;
    }
    public function getIdusertype():int
    {
        return $this->idusertype;
    }
    public function setIdusertype(int $idusertype):void
    {
        $this->idusertype = $idusertype;
    }
}

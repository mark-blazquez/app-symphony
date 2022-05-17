<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credenciales
 *
 * @ORM\Table(name="credenciales")
 * @ORM\Entity
 */
class Credenciales
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=20, nullable=false)
     */
    private $password;

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


}

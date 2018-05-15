<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExplotacionRepository")
 */
class Explotacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $latitud;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $longitud;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $propietario;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_animales;

    public function getId()
    {
        return $this->id;
    }

    public function getLatitud(): ?string
    {
        return $this->latitud;
    }

    public function setLatitud(string $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getPropietario(): ?string
    {
        return $this->propietario;
    }

    public function setPropietario(string $propietario): self
    {
        $this->propietario = $propietario;

        return $this;
    }

    public function getNumAnimales(): ?int
    {
        return $this->num_animales;
    }

    public function setNumAnimales(int $num_animales): self
    {
        $this->num_animales = $num_animales;

        return $this;
    }
}

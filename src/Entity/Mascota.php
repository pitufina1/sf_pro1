<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MascotaRepository")
 */
class Mascota
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $animal;

    /**
     * @ORM\Column(type="date")
     */
    private $fechanac;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consulta", mappedBy="mascota")
     */
    private $consultas;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="mascotas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    public function __construct()
    {
        $this->consultas = new ArrayCollection();
    }

 
    public function getId()
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAnimal(): ?string
    {
        return $this->animal;
    }

    public function setAnimal(string $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getFechanac(): ?\DateTimeInterface
    {
        return $this->fechanac;
    }

    public function setFechanac(\DateTimeInterface $fechanac): self
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * @return Collection|Consulta[]
     */
    public function getConsultas(): Collection
    {
        return $this->consultas;
    }

    public function addConsulta(Consulta $consulta): self
    {
        if (!$this->consultas->contains($consulta)) {
            $this->consultas[] = $consulta;
            $consulta->setMascota($this);
        }

        return $this;
    }

    public function removeConsulta(Consulta $consulta): self
    {
        if ($this->consultas->contains($consulta)) {
            $this->consultas->removeElement($consulta);
            // set the owning side to null (unless already changed)
            if ($consulta->getMascota() === $this) {
                $consulta->setMascota(null);
            }
        }

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }
}

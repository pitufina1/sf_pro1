<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutorRepository")
 */
class Autor
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
    private $premio;

    /**
     * @ORM\Column(type="integer")
     */
    private $edad;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Autor", mappedBy="libros", orphanRemoval=true)
     */
    private $Libro;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Libro", mappedBy="autor")
     */
    private $libros;

    public function __construct()
    {
        $this->Libro = new ArrayCollection();
        $this->libros = new ArrayCollection();
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

    public function getPremio(): ?string
    {
        return $this->premio;
    }

    public function setPremio(string $premio): self
    {
        $this->premio = $premio;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return Collection|Autor[]
     */
    public function getLibro(): Collection
    {
        return $this->Libro;
    }

    public function addLibro(Autor $libro): self
    {
        if (!$this->Libro->contains($libro)) {
            $this->Libro[] = $libro;
            $libro->setLibros($this);
        }

        return $this;
    }

    public function removeLibro(Autor $libro): self
    {
        if ($this->Libro->contains($libro)) {
            $this->Libro->removeElement($libro);
            // set the owning side to null (unless already changed)
            if ($libro->getLibros() === $this) {
                $libro->setLibros(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Libro[]
     */
    public function getLibros(): Collection
    {
        return $this->libros;
    }
}

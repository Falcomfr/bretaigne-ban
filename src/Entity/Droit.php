<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DroitRepository")
 */
class Droit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rang", inversedBy="droits")
     */
    private $Rangs;

    public function __construct()
    {
        $this->Rangs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Rang[]
     */
    public function getRangs(): Collection
    {
        return $this->Rangs;
    }

    public function addRang(Rang $rang): self
    {
        if (!$this->Rangs->contains($rang)) {
            $this->Rangs[] = $rang;
        }

        return $this;
    }

    public function removeRang(Rang $rang): self
    {
        if ($this->Rangs->contains($rang)) {
            $this->Rangs->removeElement($rang);
        }

        return $this;
    }
}

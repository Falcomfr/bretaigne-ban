<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TroupeRepository")
 */
class Troupe
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
     * @ORM\Column(type="integer")
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chateau", mappedBy="Troupes")
     */
    private $revenuTroupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Joueur", inversedBy="troupes")
     */
    private $Joueur;

    public function __construct()
    {
        $this->revenuTroupe = new ArrayCollection();
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

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Chateau[]
     */
    public function getRevenuTroupe(): Collection
    {
        return $this->revenuTroupe;
    }

    public function addRevenuTroupe(Chateau $revenuTroupe): self
    {
        if (!$this->revenuTroupe->contains($revenuTroupe)) {
            $this->revenuTroupe[] = $revenuTroupe;
            $revenuTroupe->setTroupes($this);
        }

        return $this;
    }

    public function removeRevenuTroupe(Chateau $revenuTroupe): self
    {
        if ($this->revenuTroupe->contains($revenuTroupe)) {
            $this->revenuTroupe->removeElement($revenuTroupe);
            // set the owning side to null (unless already changed)
            if ($revenuTroupe->getTroupes() === $this) {
                $revenuTroupe->setTroupes(null);
            }
        }

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->Joueur;
    }

    public function setJoueur(?Joueur $Joueur): self
    {
        $this->Joueur = $Joueur;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TerritoireRepository")
 */
class Territoire
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
     * @ORM\Column(type="string", length=255)
     */
    private $dataId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Joueur", mappedBy="territoire")
     */
    private $joueurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chateau", mappedBy="Territoire")
     */
    private $chateaux;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
        $this->chateaux = new ArrayCollection();
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

    public function getDataId(): ?string
    {
        return $this->dataId;
    }

    public function setDataId(string $dataId): self
    {
        $this->dataId = $dataId;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs[] = $joueur;
            $joueur->setTerritoire($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->joueurs->contains($joueur)) {
            $this->joueurs->removeElement($joueur);
            // set the owning side to null (unless already changed)
            if ($joueur->getTerritoire() === $this) {
                $joueur->setTerritoire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chateau[]
     */
    public function getChateaux(): Collection
    {
        return $this->chateaux;
    }

    public function addChateau(Chateau $chateau): self
    {
        if (!$this->chateaux->contains($chateau)) {
            $this->chateaux[] = $chateau;
            $chateau->setTerritoire($this);
        }

        return $this;
    }

    public function removeChateau(Chateau $chateau): self
    {
        if ($this->chateaux->contains($chateau)) {
            $this->chateaux->removeElement($chateau);
            // set the owning side to null (unless already changed)
            if ($chateau->getTerritoire() === $this) {
                $chateau->setTerritoire(null);
            }
        }

        return $this;
    }
}

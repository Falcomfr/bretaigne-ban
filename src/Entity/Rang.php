<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RangRepository")
 */
class Rang
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
     * @ORM\OneToMany(targetEntity="App\Entity\Joueur", mappedBy="rang")
     */
    private $Joueurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Droit", mappedBy="Rangs")
     */
    private $droits;

    public function __construct()
    {
        $this->Joueurs = new ArrayCollection();
        $this->droits = new ArrayCollection();
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
     * @return Collection|Joueur[]
     */
    public function getJoueurs(): Collection
    {
        return $this->Joueurs;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->Joueurs->contains($joueur)) {
            $this->Joueurs[] = $joueur;
            $joueur->setRang($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        if ($this->Joueurs->contains($joueur)) {
            $this->Joueurs->removeElement($joueur);
            // set the owning side to null (unless already changed)
            if ($joueur->getRang() === $this) {
                $joueur->setRang(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Droit[]
     */
    public function getDroits(): Collection
    {
        return $this->droits;
    }

    public function addDroit(Droit $droit): self
    {
        if (!$this->droits->contains($droit)) {
            $this->droits[] = $droit;
            $droit->addRang($this);
        }

        return $this;
    }

    public function removeDroit(Droit $droit): self
    {
        if ($this->droits->contains($droit)) {
            $this->droits->removeElement($droit);
            $droit->removeRang($this);
        }

        return $this;
    }
}

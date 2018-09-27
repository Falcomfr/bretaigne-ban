<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChateauRepository")
 */
class Chateau
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
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $revenuOr;

    /**
     * @ORM\Column(type="boolean")
     */
    private $capital;

    /**
     * @ORM\Column(type="integer")
     */
    private $revenuTroupe;

    /**
     * @ORM\Column(type="integer")
     */
    private $positionX;

    /**
     * @ORM\Column(type="integer")
     */
    private $positionY;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dataId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Territoire", inversedBy="chateaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Territoire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Joueur", inversedBy="Batailles")
     */
    private $battailles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Troupe", inversedBy="revenuTroupe")
     */
    private $Troupes;

    public function __construct()
    {
        $this->battailles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
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

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getRevenuOr(): ?int
    {
        return $this->revenuOr;
    }

    public function setRevenuOr(int $revenuOr): self
    {
        $this->revenuOr = $revenuOr;

        return $this;
    }

    public function getCapital(): ?bool
    {
        return $this->capital;
    }

    public function setCapital(bool $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getRevenuTroupe(): ?int
    {
        return $this->revenuTroupe;
    }

    public function setRevenuTroupe(int $revenuTroupe): self
    {
        $this->revenuTroupe = $revenuTroupe;

        return $this;
    }

    public function getPositionX(): ?int
    {
        return $this->positionX;
    }

    public function setPositionX(int $positionX): self
    {
        $this->positionX = $positionX;

        return $this;
    }

    public function getPositionY(): ?int
    {
        return $this->positionY;
    }

    public function setPositionY(int $positionY): self
    {
        $this->positionY = $positionY;

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

    public function getTerritoire(): ?Territoire
    {
        return $this->Territoire;
    }

    public function setTerritoire(?Territoire $Territoire): self
    {
        $this->Territoire = $Territoire;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getBattailles(): Collection
    {
        return $this->battailles;
    }

    public function addBattaille(Joueur $battaille): self
    {
        if (!$this->battailles->contains($battaille)) {
            $this->battailles[] = $battaille;
        }

        return $this;
    }

    public function removeBattaille(Joueur $battaille): self
    {
        if ($this->battailles->contains($battaille)) {
            $this->battailles->removeElement($battaille);
        }

        return $this;
    }

    public function getTroupes(): ?Troupe
    {
        return $this->Troupes;
    }

    public function setTroupes(?Troupe $Troupes): self
    {
        $this->Troupes = $Troupes;

        return $this;
    }
}

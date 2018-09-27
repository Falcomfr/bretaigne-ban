<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JoueurRepository")
 */
class Joueur
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
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbOr;

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
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Joueur")
     */
    private $attaque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Territoire", inversedBy="joueurs")
     */
    private $territoire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Chateau", mappedBy="battailles")
     */
    private $Batailles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Troupe", mappedBy="Joueur")
     */
    private $troupes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rang", inversedBy="Joueurs")
     */
    private $rang;

    public function __construct()
    {
        $this->attaque = new ArrayCollection();
        $this->Batailles = new ArrayCollection();
        $this->troupes = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNbOr(): ?int
    {
        return $this->nbOr;
    }

    public function setNbOr(int $nbOr): self
    {
        $this->nbOr = $nbOr;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getAttaque(): Collection
    {
        return $this->attaque;
    }

    public function addAttaque(Joueur $attaque): self
    {
        if (!$this->attaque->contains($attaque)) {
            $this->attaque[] = $attaque;
        }

        return $this;
    }

    public function removeAttaque(Joueur $attaque): self
    {
        if ($this->attaque->contains($attaque)) {
            $this->attaque->removeElement($attaque);
        }

        return $this;
    }

    public function getTerritoire(): ?Territoire
    {
        return $this->territoire;
    }

    public function setTerritoire(?Territoire $territoire): self
    {
        $this->territoire = $territoire;

        return $this;
    }

    /**
     * @return Collection|Chateau[]
     */
    public function getBatailles(): Collection
    {
        return $this->Batailles;
    }

    public function addBataille(Chateau $bataille): self
    {
        if (!$this->Batailles->contains($bataille)) {
            $this->Batailles[] = $bataille;
            $bataille->addBattaille($this);
        }

        return $this;
    }

    public function removeBataille(Chateau $bataille): self
    {
        if ($this->Batailles->contains($bataille)) {
            $this->Batailles->removeElement($bataille);
            $bataille->removeBattaille($this);
        }

        return $this;
    }

    /**
     * @return Collection|Troupe[]
     */
    public function getTroupes(): Collection
    {
        return $this->troupes;
    }

    public function addTroupe(Troupe $troupe): self
    {
        if (!$this->troupes->contains($troupe)) {
            $this->troupes[] = $troupe;
            $troupe->setJoueur($this);
        }

        return $this;
    }

    public function removeTroupe(Troupe $troupe): self
    {
        if ($this->troupes->contains($troupe)) {
            $this->troupes->removeElement($troupe);
            // set the owning side to null (unless already changed)
            if ($troupe->getJoueur() === $this) {
                $troupe->setJoueur(null);
            }
        }

        return $this;
    }

    public function getRang(): ?Rang
    {
        return $this->rang;
    }

    public function setRang(?Rang $rang): self
    {
        $this->rang = $rang;

        return $this;
    }
}

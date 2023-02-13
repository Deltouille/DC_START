<?php

namespace App\Entity;

use App\Repository\ServantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServantRepository::class)]
class Servant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $class = null;

    #[ORM\Column]
    private ?int $rarity = null;

    #[ORM\Column(length: 255)]
    private ?string $graph = null;

    #[ORM\Column(length: 255)]
    private ?string $face = null;

    #[ORM\OneToMany(mappedBy: 'servant', targetEntity: ServantInfo::class)]
    private Collection $servantInfos;

    public function __construct()
    {
        $this->servantInfos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getRarity(): ?int
    {
        return $this->rarity;
    }

    public function setRarity(int $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getGraph(): ?string
    {
        return $this->graph;
    }

    public function setGraph(string $graph): self
    {
        $this->graph = $graph;

        return $this;
    }

    public function getFace(): ?string
    {
        return $this->face;
    }

    public function setFace(string $face): self
    {
        $this->face = $face;

        return $this;
    }

    /**
     * @return Collection<int, ServantInfo>
     */
    public function getServantInfos(): Collection
    {
        return $this->servantInfos;
    }

    public function addServantInfo(ServantInfo $servantInfo): self
    {
        if (!$this->servantInfos->contains($servantInfo)) {
            $this->servantInfos->add($servantInfo);
            $servantInfo->setServant($this);
        }

        return $this;
    }

    public function removeServantInfo(ServantInfo $servantInfo): self
    {
        if ($this->servantInfos->removeElement($servantInfo)) {
            // set the owning side to null (unless already changed)
            if ($servantInfo->getServant() === $this) {
                $servantInfo->setServant(null);
            }
        }

        return $this;
    }
}

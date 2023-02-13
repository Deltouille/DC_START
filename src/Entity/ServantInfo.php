<?php

namespace App\Entity;

use App\Repository\ServantInfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServantInfoRepository::class)]
class ServantInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $skill1 = null;

    #[ORM\Column]
    private ?int $skill2 = null;

    #[ORM\Column]
    private ?int $skill3 = null;

    #[ORM\Column]
    private ?int $bond = null;

    #[ORM\Column]
    private ?int $np = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_obtention = null;

    #[ORM\ManyToOne(inversedBy: 'servant')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'servantInfos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Servant $servant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getSkill1(): ?int
    {
        return $this->skill1;
    }

    public function setSkill1(int $skill1): self
    {
        $this->skill1 = $skill1;

        return $this;
    }

    public function getSkill2(): ?int
    {
        return $this->skill2;
    }

    public function setSkill2(int $skill2): self
    {
        $this->skill2 = $skill2;

        return $this;
    }

    public function getSkill3(): ?int
    {
        return $this->skill3;
    }

    public function setSkill3(int $skill3): self
    {
        $this->skill3 = $skill3;

        return $this;
    }

    public function getBond(): ?int
    {
        return $this->bond;
    }

    public function setBond(int $bond): self
    {
        $this->bond = $bond;

        return $this;
    }

    public function getNp(): ?int
    {
        return $this->np;
    }

    public function setNp(int $np): self
    {
        $this->np = $np;

        return $this;
    }

    public function getDateObtention(): ?\DateTimeInterface
    {
        return $this->date_obtention;
    }

    public function setDateObtention(\DateTimeInterface $date_obtention): self
    {
        $this->date_obtention = $date_obtention;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getServant(): ?Servant
    {
        return $this->servant;
    }

    public function setServant(?Servant $servant): self
    {
        $this->servant = $servant;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\UserInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserInfoRepository::class)]
class UserInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $version = null;

    #[ORM\Column(nullable: true)]
    private ?int $quartz = null;

    #[ORM\Column(nullable: true)]
    private ?int $bronze_apple = null;

    #[ORM\Column(nullable: true)]
    private ?int $silver_apple = null;

    #[ORM\Column(nullable: true)]
    private ?int $golden_apple = null;

    #[ORM\Column(nullable: true)]
    private ?int $blue_apple = null;

    #[ORM\Column(nullable: true)]
    private ?int $mana_prism = null;

    #[ORM\Column(nullable: true)]
    private ?int $pure_prism = null;

    #[ORM\Column(nullable: true)]
    private ?int $rare_prism = null;

    #[ORM\Column(nullable: true)]
    private ?int $uso = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getQuartz(): ?int
    {
        return $this->quartz;
    }

    public function setQuartz(?int $quartz): self
    {
        $this->quartz = $quartz;

        return $this;
    }

    public function getBronzeApple(): ?int
    {
        return $this->bronze_apple;
    }

    public function setBronzeApple(?int $bronze_apple): self
    {
        $this->bronze_apple = $bronze_apple;

        return $this;
    }

    public function getSilverApple(): ?int
    {
        return $this->silver_apple;
    }

    public function setSilverApple(?int $silver_apple): self
    {
        $this->silver_apple = $silver_apple;

        return $this;
    }

    public function getGoldenApple(): ?int
    {
        return $this->golden_apple;
    }

    public function setGoldenApple(?int $golden_apple): self
    {
        $this->golden_apple = $golden_apple;

        return $this;
    }

    public function getBlueApple(): ?int
    {
        return $this->blue_apple;
    }

    public function setBlueApple(?int $blue_apple): self
    {
        $this->blue_apple = $blue_apple;

        return $this;
    }

    public function getManaPrism(): ?int
    {
        return $this->mana_prism;
    }

    public function setManaPrism(?int $mana_prism): self
    {
        $this->mana_prism = $mana_prism;

        return $this;
    }

    public function getPurePrism(): ?int
    {
        return $this->pure_prism;
    }

    public function setPurePrism(?int $pure_prism): self
    {
        $this->pure_prism = $pure_prism;

        return $this;
    }

    public function getRarePrism(): ?int
    {
        return $this->rare_prism;
    }

    public function setRarePrism(?int $rare_prism): self
    {
        $this->rare_prism = $rare_prism;

        return $this;
    }

    public function getUso(): ?int
    {
        return $this->uso;
    }

    public function setUso(?int $uso): self
    {
        $this->uso = $uso;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

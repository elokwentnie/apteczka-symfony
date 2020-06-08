<?php

namespace App\Entity;

use App\Repository\ListalekRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListalekRepository::class)
 */
class Listalek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="listaleks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="date")
     */
    private $datawaznosci;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc;

    /**
     * @ORM\ManyToOne(targetEntity=listalekow::class, inversedBy="listaleks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $slowniklekow;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDatawaznosci(): ?\DateTimeInterface
    {
        return $this->datawaznosci;
    }

    public function setDatawaznosci(\DateTimeInterface $datawaznosci): self
    {
        $this->datawaznosci = $datawaznosci;

        return $this;
    }

    public function getIlosc(): ?int
    {
        return $this->ilosc;
    }

    public function setIlosc(int $ilosc): self
    {
        $this->ilosc = $ilosc;

        return $this;
    }

    public function getSlowniklekow(): ?listalekow
    {
        return $this->slowniklekow;
    }

    public function setSlowniklekow(?listalekow $slowniklekow): self
    {
        $this->slowniklekow = $slowniklekow;

        return $this;
    }
}

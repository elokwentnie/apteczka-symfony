<?php

namespace App\Entity;

use App\Repository\MedykamentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedykamentRepository::class)
 */
class Medykament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="date")
     */
    private $datawaznosci;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc;

    /**
     * @ORM\ManyToOne(targetEntity=Listalekow::class, inversedBy="listaleks", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $slowniklekow;

    /**
     * @ORM\ManyToOne(targetEntity=Apteczka::class, inversedBy="medykamenty")
     * @ORM\JoinColumn(nullable=false)
     */
    private $apteczka;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wydanych;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $zutylizowanych;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlowniklekow(): ?Listalekow
    {
        return $this->slowniklekow;
    }

    public function setSlowniklekow(?Listalekow $slowniklekow): self
    {
        $this->slowniklekow = $slowniklekow;

        return $this;
    }

    public function getApteczka(): ?Apteczka
    {
        return $this->apteczka;
    }

    public function setApteczka(?Apteczka $apteczka): self
    {
        $this->apteczka = $apteczka;

        return $this;
    }

    public function getWydanych(): ?int
    {
        return $this->wydanych;
    }

    public function setWydanych(?int $wydanych): self
    {
        $this->wydanych = $wydanych;

        return $this;
    }

    public function getZutylizowanych(): ?bool
    {
        return $this->zutylizowanych;
    }

    public function setZutylizowanych(?bool $zutylizowanych): self
    {
        $this->zutylizowanych = $zutylizowanych;

        return $this;
    }
}

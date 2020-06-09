<?php

namespace App\Entity;

use App\Repository\ApteczkaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApteczkaRepository::class)
 */
class Apteczka
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="apteczki")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    /**
     * @ORM\OneToMany(targetEntity=Medykament::class, mappedBy="apteczka", orphanRemoval=true, cascade={"persist"})
     */
    private $medykamenty;

    public function __construct()
    {
        $this->medykamenty = new ArrayCollection();
    }

 
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

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * @return Collection|Medykament[]
     */
    public function getMedykamenty(): Collection
    {
        return $this->medykamenty;
    }

    public function addMedykamenty(Medykament $medykamenty): self
    {
        if (!$this->medykamenty->contains($medykamenty)) {
            $this->medykamenty[] = $medykamenty;
            $medykamenty->setApteczka($this);
        }

        return $this;
    }

    public function removeMedykamenty(Medykament $medykamenty): self
    {
        if ($this->medykamenty->contains($medykamenty)) {
            $this->medykamenty->removeElement($medykamenty);
            // set the owning side to null (unless already changed)
            if ($medykamenty->getApteczka() === $this) {
                $medykamenty->setApteczka(null);
            }
        }

        return $this;
    }
}
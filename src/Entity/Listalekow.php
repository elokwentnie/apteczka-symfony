<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listalekow
 *
 * @ORM\Table(name="listalekow", indexes={@ORM\Index(name="id_PodmiotOdpow", columns={"id_PodmiotOdpow"}), @ORM\Index(name="id_FirmawPL", columns={"id_FirmawPL"}), @ORM\Index(name="id_status", columns={"id_status"})})
 * @ORM\Entity
 */
class Listalekow
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_status", type="integer", nullable=false)
     */
    private $idStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NazwaHandlowa", type="string", length=120, nullable=true, options={"default"="''"})
     */
    private $nazwahandlowa = '\'\'';

    /**
     * @var int
     *
     * @ORM\Column(name="id_PodmiotOdpow", type="integer", nullable=false)
     */
    private $idPodmiotodpow;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Postac", type="string", length=32, nullable=true, options={"default"="''"})
     */
    private $postac = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Dawka", type="string", length=42, nullable=true, options={"default"="''"})
     */
    private $dawka = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Opakowanie", type="string", length=42, nullable=true, options={"default"="''"})
     */
    private $opakowanie = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="BAZYL", type="string", length=6, nullable=true, options={"default"="''"})
     */
    private $bazyl = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="KodKreskowy", type="string", length=14, nullable=true, options={"default"="''"})
     */
    private $kodkreskowy = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ATC_WHO", type="string", length=5, nullable=true, options={"default"="''"})
     */
    private $atcWho = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NazwaMiedzynarodowa", type="string", length=40, nullable=true, options={"default"="''"})
     */
    private $nazwamiedzynarodowa = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Odpowiedniki", type="string", length=128, nullable=true, options={"default"="''"})
     */
    private $odpowiedniki = '\'\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SynonimFarmaceutyczny", type="string", length=129, nullable=true, options={"default"="''"})
     */
    private $synonimfarmaceutyczny = '\'\'';

    /**
     * @var int
     *
     * @ORM\Column(name="id_FirmawPL", type="integer", nullable=false)
     */
    private $idFirmawpl;

    /**
     * @ORM\OneToMany(targetEntity=Medykament::class, mappedBy="slowniklekow")
     */
    private $listaleks;

    public function __construct()
    {
        $this->listaleks = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getnazwahadlowa() {
        return $this->nazwahandlowa;
    }
    /**
     * @return Collection|Listalek[]
     */
    public function getListaleks(): Collection
    {
        return $this->listaleks;
    }

    public function addListalek(Medykament $listalek): self
    {
        if (!$this->listaleks->contains($listalek)) {
            $this->listaleks[] = $listalek;
            $listalek->setSlowniklekow($this);
        }

        return $this;
    }

    public function removeListalek(Medykament $listalek): self
    {
        if ($this->listaleks->contains($listalek)) {
            $this->listaleks->removeElement($listalek);
            // set the owning side to null (unless already changed)
            if ($listalek->getSlowniklekow() === $this) {
                $listalek->setSlowniklekow(null);
            }
        }

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listalekowpodmiotodpow
 *
 * @ORM\Table(name="listalekowpodmiotodpow")
 * @ORM\Entity
 */
class Listalekowpodmiotodpow
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_PodmiotOdpow", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPodmiotodpow;

    /**
     * @var string
     *
     * @ORM\Column(name="PodmiotOdpowiedzialny", type="string", length=79, nullable=false)
     */
    private $podmiotodpowiedzialny;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listalekowfirmawpl
 *
 * @ORM\Table(name="listalekowfirmawpl")
 * @ORM\Entity
 */
class Listalekowfirmawpl
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_FirmawPL", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFirmawpl;

    /**
     * @var string
     *
     * @ORM\Column(name="FirmawPolsce", type="string", length=128, nullable=false)
     */
    private $firmawpolsce;

    /**
     * @var string
     *
     * @ORM\Column(name="Adres", type="string", length=67, nullable=false)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefon", type="string", length=101, nullable=false)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="NIP", type="string", length=10, nullable=false)
     */
    private $nip;

    /**
     * @var string
     *
     * @ORM\Column(name="REGON", type="string", length=14, nullable=false)
     */
    private $regon;

    /**
     * @var string
     *
     * @ORM\Column(name="WWW", type="string", length=50, nullable=false)
     */
    private $www;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=false)
     */
    private $email;


}

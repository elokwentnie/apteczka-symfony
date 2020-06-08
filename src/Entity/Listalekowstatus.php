<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listalekowstatus
 *
 * @ORM\Table(name="listalekowstatus")
 * @ORM\Entity
 */
class Listalekowstatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_status", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=59, nullable=false)
     */
    private $status;


}

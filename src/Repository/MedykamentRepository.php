<?php

namespace App\Repository;

use App\Entity\Medykament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medykament|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medykament|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medykament[]    findAll()
 * @method Medykament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedykamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medykament::class);
    }

    // /**
    //  * @return Listalek[] Returns an array of Listalek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Listalek
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

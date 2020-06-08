<?php

namespace App\Repository;

use App\Entity\Listalek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Listalek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Listalek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Listalek[]    findAll()
 * @method Listalek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListalekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listalek::class);
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

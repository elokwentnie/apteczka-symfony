<?php

namespace App\Repository;

use App\Entity\Apteczka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apteczka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apteczka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apteczka[]    findAll()
 * @method Apteczka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApteczkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apteczka::class);
    }

    // /**
    //  * @return Apteczka[] Returns an array of Apteczka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Apteczka
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

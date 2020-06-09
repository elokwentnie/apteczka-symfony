<?php

namespace App\Repository;

use App\Entity\Listalekow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Listalekow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Listalekow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Listalekow[]    findAll()
 * @method Listalekow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListalekowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Listalekow::class);
    }

    public function getChoices() {
        $qb = $this->createQueryBuilder('ad');
        $c =  $qb -> select('ad.id as value, ad.nazwahandlowa as label')->setMaxResults(10)->getQuery()->getArrayResult();
        $r = [];
        foreach ($c as $d) {
            $r[$d['value']] = $d['label'];
        }

        return $r;
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

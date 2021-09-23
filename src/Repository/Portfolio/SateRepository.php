<?php

namespace App\Repository\Portfolio;

use App\Entity\Portfolio\Sate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sate[]    findAll()
 * @method Sate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sate::class);
    }

    // /**
    //  * @return Sate[] Returns an array of Sate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sate
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

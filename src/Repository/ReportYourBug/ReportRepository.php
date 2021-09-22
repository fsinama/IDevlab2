<?php

namespace App\Repository\ReportYourBug;

use App\Entity\ReportYourBug\Report;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @method Report|null find($id, $lockMode = null, $lockVersion = null)
 * @method Report|null findOneBy(array $criteria, array $orderBy = null)
 * @method Report[]    findAll()
 * @method Report[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Report::class);
    }

    public function findByFilter(?String $title,?int $id,?int $technology,?array $type)
    {
         $qb = $this->createQueryBuilder("r");

         if (!empty($title)) {
             $qb ->andWhere("r.title LIKE :title")
                 ->setParameter("title","%".$title."%");
         }

         if (!empty($id)) {
             $qb = $this->createQueryBuilder("r")
                 ->andWhere("r.id = :id")
                 ->setParameter("id",$id);
         }

         if(!empty($technology)) {
             $qb = $this->createQueryBuilder("r")
                 ->andWhere("r.technology = :id")
                 ->setParameter("id",$technology);
         }

         if(!empty($type)) {
             $qb = $this->createQueryBuilder("r")
                 ->andWhere(":id MEMBER OF r.types")
                 ->setParameter("id",$type);
         }

        return $qb
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Report[] Returns an array of Report objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Report
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

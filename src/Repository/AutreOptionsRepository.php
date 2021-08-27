<?php

namespace App\Repository;

use App\Entity\AutreOptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AutreOptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutreOptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutreOptions[]    findAll()
 * @method AutreOptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutreOptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AutreOptions::class);
    }

    // /**
    //  * @return AutreOptions[] Returns an array of AutreOptions objects
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
    public function findOneBySomeField($value): ?AutreOptions
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

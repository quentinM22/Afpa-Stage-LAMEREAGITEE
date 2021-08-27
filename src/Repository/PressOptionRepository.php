<?php

namespace App\Repository;

use App\Entity\PressOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PressOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method PressOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method PressOption[]    findAll()
 * @method PressOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PressOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PressOption::class);
    }

    // /**
    //  * @return PressOption[] Returns an array of PressOption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PressOption
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

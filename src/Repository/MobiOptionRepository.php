<?php

namespace App\Repository;

use App\Entity\MobiOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MobiOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method MobiOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method MobiOption[]    findAll()
 * @method MobiOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MobiOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MobiOption::class);
    }

    // /**
    //  * @return MobiOption[] Returns an array of MobiOption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MobiOption
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Presses;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Presses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presses[]    findAll()
 * @method Presses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PressesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Presses::class);
    }
    public function findAllVisibleQuery(Search $search): Query
    {
        $query = $this->findVisibleQuery();
                

        if ($search->getOptions()->count() > 0) {
            $k = 0;
            foreach ($search->getOptions() as $options) {
                $k++;
                $query = $query
                    ->andwhere(":option$k MEMBER OF p.pressOptions")
                    ->setParameter("option$k", $options);
            }
        }

        return $query->getQuery();
    }
    private function findVisibleQuery(): QueryBuilder
    {
        return $this
            ->createQueryBuilder('p');
    }
    // /**
    //  * @return Presses[] Returns an array of Presses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Presses
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

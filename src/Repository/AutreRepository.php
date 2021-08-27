<?php

namespace App\Repository;

use App\Entity\Autre;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Autre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autre[]    findAll()
 * @method Autre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autre::class);
    }
    //----------CREATION REQUETE---------------
    public function findLatest():array
    {
        return $this->createQueryBuilder('p')
        ->setMaxResults(4)
        ->getQuery()
        ->getResult();
    }
    public function findAllVisibleQuery(Search $search): Query
    {
        $query = $this->findVisibleQuery();
                

        if ($search->getOptions()->count() > 0) {
            $k = 0;
            foreach ($search->getOptions() as $options) {
                $k++;
                $query = $query
                    ->andwhere(":option$k MEMBER OF p.otherOption")
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
    //  * @return Autre[] Returns an array of Autre objects
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
    public function findOneBySomeField($value): ?Autre
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

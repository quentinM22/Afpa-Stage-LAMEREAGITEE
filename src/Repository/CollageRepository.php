<?php

namespace App\Repository;

use App\Entity\Collage;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Collage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collage[]    findAll()
 * @method Collage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collage::class);
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
                    ->andwhere(":option$k MEMBER OF p.collOptions")
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
    //  * @return Collage[] Returns an array of Collage objects
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
    public function findOneBySomeField($value): ?Collage
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

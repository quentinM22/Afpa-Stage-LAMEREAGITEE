<?php

namespace App\Repository;

use App\Entity\Mobilier;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mobilier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mobilier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mobilier[]    findAll()
 * @method Mobilier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MobilierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mobilier::class);
    }
    //----------CREATION REQUETE---------------
    public function findLatest():array
    {
        return $this->createQueryBuilder('p')
        ->orderBy('mobilier.created_at', 'ASC')
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
                    ->andwhere(":option$k MEMBER OF p.mobiOptions")
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
    //  * @return Mobilier[] Returns an array of Mobilier objects
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
    public function findOneBySomeField($value): ?Mobilier
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

<?php

namespace App\Repository;

use App\Entity\Range;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Range|null find($id, $lockMode = null, $lockVersion = null)
 * @method Range|null findOneBy(array $criteria, array $orderBy = null)
 * @method Range[]    findAll()
 * @method Range[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RangeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Range::class);
    }

//    /**
//     * @return Range[] Returns an array of Range objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Range
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

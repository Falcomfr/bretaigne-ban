<?php

namespace App\Repository;

use App\Entity\Chateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chateau[]    findAll()
 * @method Chateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChateauRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chateau::class);
    }

//    /**
//     * @return Chateau[] Returns an array of Chateau objects
//     */
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
    public function findOneBySomeField($value): ?Chateau
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

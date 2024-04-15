<?php

namespace App\Repository;

use App\Entity\Inserer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Inserer>
 *
 * @method Inserer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inserer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inserer[]    findAll()
 * @method Inserer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsererRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inserer::class);
    }

    //    /**
    //     * @return Inserer[] Returns an array of Inserer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Inserer
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

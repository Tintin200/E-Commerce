<?php

namespace App\Repository;

use App\Entity\AssocierBox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AssocierBox>
 *
 * @method AssocierBox|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssocierBox|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssocierBox[]    findAll()
 * @method AssocierBox[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssocierBoxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssocierBox::class);
    }

    //    /**
    //     * @return AssocierBox[] Returns an array of AssocierBox objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AssocierBox
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\InvoicesHasProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InvoicesHasProduct>
 *
 * @method InvoicesHasProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoicesHasProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoicesHasProduct[]    findAll()
 * @method InvoicesHasProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoicesHasProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoicesHasProduct::class);
    }

//    /**
//     * @return InvoicesHasProduct[] Returns an array of InvoicesHasProduct objects
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

//    public function findOneBySomeField($value): ?InvoicesHasProduct
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

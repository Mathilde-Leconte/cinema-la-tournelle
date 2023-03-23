<?php

namespace App\Repository;

use App\Entity\ContenuFrontInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContenuFrontInfo>
 *
 * @method ContenuFrontInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenuFrontInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenuFrontInfo[]    findAll()
 * @method ContenuFrontInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuFrontInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenuFrontInfo::class);
    }

    public function save(ContenuFrontInfo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContenuFrontInfo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ContenuFrontInfo[] Returns an array of ContenuFrontInfo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContenuFrontInfo
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

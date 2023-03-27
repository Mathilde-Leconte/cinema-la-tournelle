<?php

namespace App\Repository;

use App\Entity\Tarif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tarif>
 *
 * @method Tarif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tarif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tarif[]    findAll()
 * @method Tarif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarif::class);
    }

    public function save(Tarif $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tarif $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Tarif[] Returns an array of Tarif objects
//     */
    // public function getTarifNoms($tarifNom): array
    // {
    //     return $this->createQueryBuilder('ta')
    //         ->join('ta.types', 'ty')
    //         ->andWhere('ty.nom = :val')
    //         ->setParameter('val', $tarifNom)
    //         ->orderBy('t.id', 'ASC')
    //         // ->setMaxResults(4)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    // public function getTarifNoms(): array
    // {
    //     return $this->createQueryBuilder('ta')
    //         ->leftjoin('ta.types', 'ty')
    //         ->addSelect('ty')
    //         ->orderBy('t.id', 'DESC')
    //         // ->setMaxResults(4)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

//    public function findOneBySomeField($value): ?Tarif
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

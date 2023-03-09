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

public function findByTypeID($type_id): array
{   
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
        SELECT * FROM tarif ta
        WHERE ta.type_de_seance_id > :type_de_seance_id
        ORDER BY ta.type_de_seance_id ASC
        ';
    $stmt = $conn->prepare($sql);
    $resultSet = $stmt->executeQuery(['type_de_seance_id' => $type_id]);

    // returns an array of arrays (i.e. a raw data set)
    return $resultSet->fetchAllAssociative();


}


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

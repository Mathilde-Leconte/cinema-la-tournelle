<?php

namespace App\Repository;

use App\Entity\Seance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Seance>
 *
 * @method Seance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seance[]    findAll()
 * @method Seance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seance::class);
    }

    public function save(Seance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Seance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Seance[] Returns an array of Seance objects
//     */
public function findAllWithSeance()
{
    return $this->createQueryBuilder('s')
        ->leftJoin('s.typeDeSeance', 't')
        ->leftJoin('t.film', 'f')
        ->select('f.titre')
        ->getQuery()
        ->getResult();
}

public function findByDateRange(\DateTimeInterface $start, \DateTimeInterface $end): array
{
    return $this->createQueryBuilder('s')
        ->where('s.start >= :start')
        ->andWhere('s.end <= :end')
        ->setParameter('start', $start)
        ->setParameter('end', $end)
        ->getQuery()
        ->getResult();
}

public function findNextEvent(\DateTime $now): ?Seance
{
    $qb = $this->createQueryBuilder('s')
        ->where('s.start > :now')
        ->orderBy('s.start', 'ASC')
        ->setMaxResults(1)
        ->setParameter('now', $now)
        ->getQuery();

    return $qb->getOneOrNullResult();
}

//    public function findOneBySomeField($value): ?Seance
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\Hotels;
use App\Entity\Suite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Suite>
 *
 * @method Suite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suite[]    findAll()
 * @method Suite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suite::class);
    }

    public function save(Suite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Suite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySlug($value): array {
        return $this->createQueryBuilder('s')
            ->leftJoin(Hotels::class, 'h', 'h.id = s.hotel_id')
            ->andWhere('h.slug = :val')
            ->setParameter('val', $value)
            ->orderBy('s.name', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

//        return $qb->getQuery();
//    }
//    /**
//     * @return Suite[] Returns an array of Suite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function getByHotel($hotel): ?array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.hotel = :hotel')
            ->setParameter('hotel', $hotel)
            ->getQuery()
            ->getResult();
    }
}

//    public function findBySlug(?Hotels $hotel = null): Query
//    {
//        $qb = $this->createQueryBuilder('s')
//            ->orderBy('s.name', 'DESC');
//        
//        if ($hotel) {
//            $qb->leftJoin('s.hotels','h')
//                ->where($qb->expr()->eq('h.slug', ':slug'))
//                ->setParameter('slug', $hotel->getSlug());
//        }
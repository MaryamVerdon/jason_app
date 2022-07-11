<?php

namespace App\Repository;

use App\Entity\Personne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Personne>
 *
 * @method Personne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personne[]    findAll()
 * @method Personne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personne::class);
    }

    public function add(Personne $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Personne $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findSearch($search): array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('p', 'r', 'rl')
            ->join('p.rang', 'r')
            ->join('p.role', 'rl');

        if (!empty($search->q)) {
            $query = $query
                ->andWhere('r.libelle LIKE :q')
                ->orWhere('rl.libelle LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if (!empty($search->ageMin)) {
            $query = $query
                ->andWhere('p.age >= :ageMin')
                ->setParameter('ageMin', $search->ageMin);
        }
        if (!empty($search->ageMax)) {
            $query = $query
                ->andWhere('p.age <= :ageMax')
                ->setParameter('ageMax', $search->ageMax);
        }

        if (!empty($search->rangs)) {
            $query = $query
                ->andWhere('r.id = :rangs')
                ->setParameter('rangs', $search->rangs);
        }

        if (!empty($search->roles)) {
            $query = $query
                ->andWhere('rl.id  = :roles')
                ->setParameter('roles', $search->roles);
        }

        return $query->getQuery()->getResult();
    }





    //    /**
    //     * @return Personne[] Returns an array of Personne objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Personne
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

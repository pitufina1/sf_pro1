<?php

namespace App\Repository;

use App\Entity\Perro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Perro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Perro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Perro[]    findAll()
 * @method Perro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PerroRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Perro::class);
    }

//    /**
//     * @return Perro[] Returns an array of Perro objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Perro
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

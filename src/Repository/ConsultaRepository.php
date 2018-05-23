<?php

namespace App\Repository;

use App\Entity\Consulta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Consulta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consulta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consulta[]    findAll()
 * @method Consulta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Consulta::class);
    }

//    /**
//     * @return Consulta[] Returns an array of Consulta objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consulta
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

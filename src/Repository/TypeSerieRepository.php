<?php

namespace App\Repository;

use App\Entity\TypeSerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeSerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeSerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeSerie[]    findAll()
 * @method TypeSerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeSerieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeSerie::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}

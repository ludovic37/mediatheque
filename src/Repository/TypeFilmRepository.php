<?php

namespace App\Repository;

use App\Entity\TypeFilm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeFilm|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeFilm|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeFilm[]    findAll()
 * @method TypeFilm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeFilmRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeFilm::class);
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

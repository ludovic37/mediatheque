<?php

namespace App\Repository;

use App\Entity\TypeAnime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAnime|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAnime|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAnime[]    findAll()
 * @method TypeAnime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAnimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAnime::class);
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

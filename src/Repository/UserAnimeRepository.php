<?php

namespace App\Repository;

use App\Entity\UserAnime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserAnime|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAnime|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAnime[]    findAll()
 * @method UserAnime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAnimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserAnime::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\AnimeEpisode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AnimeEpisode|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeEpisode|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeEpisode[]    findAll()
 * @method AnimeEpisode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeEpisodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AnimeEpisode::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}

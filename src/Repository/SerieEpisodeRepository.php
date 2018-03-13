<?php

namespace App\Repository;

use App\Entity\SerieEpisode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SerieEpisode|null find($id, $lockMode = null, $lockVersion = null)
 * @method SerieEpisode|null findOneBy(array $criteria, array $orderBy = null)
 * @method SerieEpisode[]    findAll()
 * @method SerieEpisode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieEpisodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SerieEpisode::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.something = :value')->setParameter('value', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}

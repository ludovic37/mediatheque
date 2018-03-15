<?php

namespace App\Repository;

use App\Entity\Anime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Anime|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anime|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anime[]    findAll()
 * @method Anime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Anime::class);
    }

    public function findAllAnime(){
        return $this->createQueryBuilder('a')
            ->leftJoin('a.episode','e')
            ->orderBy('e.sortie', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findFiveLastAnime(){
        return $this->createQueryBuilder('a')
            ->leftJoin('a.episode','e')
            ->where('a.id = e.anime')
            ->orderBy('e.sortie', 'DESC')
            //->groupBy('a.id')
            //->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;

    }

    /*public function findFiveLastAnime(){

        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT * FROM anime, anime_episode
            WHERE (anime.id, anime_episode.sortie) IN (
                SELECT anime_id, MAX(sortie) FROM anime_episode GROUP BY anime_id
            )
            ORDER BY anime_episode.sortie DESC';

        $stmt = $conn->prepare($sql);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }*/

    /**/

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

<?php

namespace App\Repository;

use App\Entity\UserFilm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserFilm|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserFilm|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserFilm[]    findAll()
 * @method UserFilm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserFilmRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserFilm::class);
    }

    public function findAllFilmUser($user)
    {
        return $this->createQueryBuilder('uf')
            ->join('uf.film', 'f')
            ->where('uf.user = :value')->setParameter('value', $user)
            ->orderBy('f.sortie', 'DESC')
            ->getQuery()
            ->getResult()
            ;
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

<?php

namespace App\Repository;

use App\Entity\UserSerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserSerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSerie[]    findAll()
 * @method UserSerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSerieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserSerie::class);
    }

    public function findAllSerieUser($user)
    {
        return $this->createQueryBuilder('uf')
            ->join('uf.serie', 's')
            ->join('s.episode','e')
            ->where('uf.user = :value')->setParameter('value', $user)
            ->orderBy('e.sortie', 'DESC')
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

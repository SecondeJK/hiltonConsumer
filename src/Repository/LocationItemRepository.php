<?php

namespace App\Repository;

use App\Entity\LocationItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LocationItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationItem[]    findAll()
 * @method LocationItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LocationItem::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('l')
            ->where('l.something = :value')->setParameter('value', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}

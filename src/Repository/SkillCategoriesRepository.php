<?php

namespace App\Repository;

use App\Entity\SkillCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SkillCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillCategories[]    findAll()
 * @method SkillCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SkillCategories::class);
    }

//    /**
//     * @return SkillCategories[] Returns an array of SkillCategories objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SkillCategories
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

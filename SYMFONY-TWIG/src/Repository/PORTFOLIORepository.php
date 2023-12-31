<?php

namespace App\Repository;

use App\Entity\PORTFOLIO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PORTFOLIO>
 *
 * @method PORTFOLIO|null find($id, $lockMode = null, $lockVersion = null)
 * @method PORTFOLIO|null findOneBy(array $criteria, array $orderBy = null)
 * @method PORTFOLIO[]    findAll()
 * @method PORTFOLIO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PORTFOLIORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PORTFOLIO::class);
    }

    public function add(PORTFOLIO $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PORTFOLIO $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return PORTFOLIO[] Returns an array of PORTFOLIO objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PORTFOLIO
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllPortfoliosWithRelations()
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.countryPortfolio', 'c')
            ->addSelect('c')
            ->leftJoin('p.usuariosPortfolio', 'u')
            ->addSelect('u')
            ->leftJoin('p.sentimentalPortfolio', 's')
            ->addSelect('s')
            ->leftJoin('p.levelPortfolio', 'l')
            ->addSelect('l')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findPortfolioByIdWithRelations(int $id)
    {
        $qb =  $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('p.countryPortfolio', 'c')
            ->addSelect('c')
            ->leftJoin('p.usuariosPortfolio', 'u')
            ->addSelect('u')
            ->leftJoin('p.sentimentalPortfolio', 's')
            ->addSelect('s')
            ->leftJoin('p.levelPortfolio', 'l')
            ->addSelect('l')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}

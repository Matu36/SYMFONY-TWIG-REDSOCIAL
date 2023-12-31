<?php

namespace App\Repository;

use App\Entity\COMENTARIOS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<COMENTARIOS>
 *
 * @method COMENTARIOS|null find($id, $lockMode = null, $lockVersion = null)
 * @method COMENTARIOS|null findOneBy(array $criteria, array $orderBy = null)
 * @method COMENTARIOS[]    findAll()
 * @method COMENTARIOS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class COMENTARIOSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, COMENTARIOS::class);
    }

    public function add(COMENTARIOS $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(COMENTARIOS $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return COMENTARIOS[] Returns an array of COMENTARIOS objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?COMENTARIOS
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllComentariossWithRelations()
    {
        $qb = $this->createQueryBuilder('com')
            ->addSelect('com.contenido', 'com.id')
            ->leftJoin('com.usuariosComentarios', 'u')
            ->addSelect('u.nombre', 'u.apellido')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findComentariosByIdWithRelations(int $id)
{
    $qb = $this->createQueryBuilder('come')
        ->andWhere('come.id = :id')
        ->setParameter('id', $id)
        ->addSelect('come.contenido')
        ->leftJoin('come.usuariosComentarios', 'u')
        ->addSelect('u.nombre', 'u.apellido')
        ->getQuery()
        ->getOneOrNullResult();

    return $qb;
}


    public function findComentariosByComentarios(int $comentarios_id)
    {
        $qb = $this->createQueryBuilder('coment')
            ->andWhere('coment.comentarios_id = :comentarios_id')
            ->setParameter('comentarios_id', $comentarios_id)
            ->leftJoin('coment.usuariosComentarios', 'u')
            ->addSelect('u.nombre', 'u.apellido')
            ->getQuery()
            ->getArrayResult();

        return $qb;
    }
}

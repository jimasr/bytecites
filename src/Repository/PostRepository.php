<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    /**
     * PostRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * Save an entity in the database
     * @param Post $entity 
     * @param bool $flush
     * @return void
     */
    public function save(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Remove an entity from the database
     * @param Post $entity 
     * @param bool $flush
     * @return void
     */
    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * Search in the title, description and content of the post
    * @param string $value
    * @return Post[] Returns an array of Post objects
    */
   public function findByName($value): array
   {
       $qb = $this->createQueryBuilder('p');
            
       $qb->where(
            $qb->expr()->orX(
                $qb->expr()->like('p.title', ':val'),
                $qb->expr()->like('p.description', ':val'),
                $qb->expr()->like('p.content', ':val')
                ),
            $qb->expr()->isNotNull('p.publishedAt')
            )
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->setParameter('val', '%'.$value.'%');

        return $qb->getQuery()->getResult();
   }

//    public function findOneBySomeField($value): ?Post
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace Internit\BannerBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Tupi\AdminBundle\Entity\CrudRepository;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * BannerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BannerRepository extends CrudRepository
{
    public function listItens($key = 'item', $first = 0, $max = 10) {
        	
        $builder = $this->createQueryBuilder($key);
        $builder->setFirstResult( $first );
        $builder->setMaxResults( $max );
        $builder->orderBy("{$key}.position","ASC");
    
        return $builder;
    }
    
    public function limitBanner($limit)
    {
        $qb = $this->createQueryBuilder("i")
        ->select('i')
        ->orderBy('i.createdAt', 'DESC')
        ->setMaxResults($limit);
        	
        return $qb->getQuery()->getResult();
    }
    
    
    public function OrderPosition($pos = "DESC")
    {
        $qb = $this->createQueryBuilder('po')
        ->select('po')
        ->orderBy('po.position', $pos);
        	
        return $qb->getQuery()->getResult();
    }
    
    public function lastPosition()
    {
        $qb = $this->createQueryBuilder('e')
        ->select('e.position')
        ->orderBy('e.position', 'DESC')
        ->setMaxResults(1);
        	
        return $qb->getQuery()->getSingleResult();
    }
    
    public function getCount()
    {
        $qb = $this->createQueryBuilder('p')
        ->select('count(p.id)');
    
        return $qb->getQuery()->getSingleScalarResult();
    }
}
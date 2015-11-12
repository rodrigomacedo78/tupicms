<?php

namespace Internit\ContactBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Tupi\AdminBundle\Entity\CrudRepository;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactPersonRepository extends CrudRepository
{
	public function listItens($key = 'item', $first = 0, $max = 10){
		
		$builder = $this->createQueryBuilder($key)
		->join("{$key}.requests","s")
		->where("s.person = {$key}.id")
		->andWhere("s.informativo =:informativo")
		->setParameter("informativo","sim")
		->setFirstResult($first)
		->setMaxResults($max)
		->orderBy("{$key}.id","ASC");

		return $builder;
	}

	public function getContacts($all = true){
		$builder = $this->createQueryBuilder('p')
		->select("p.name, p.email, p.telefone, p.celular, perg.message, perg.sentToGroup, perg.conheceu, perg.createdAt")
		->innerJoin("InternitContactBundle:ContactRequest", "perg")
		->where("p.id = perg.person");
		if(!$all){
			$builder
			->andWhere("perg.informativo =:informativo")
			->setParameter("informativo","sim");
		}
		$builder
		->orderBy("perg.createdAt","desc");

		return $builder->getQuery()->getArrayResult();
	}
}

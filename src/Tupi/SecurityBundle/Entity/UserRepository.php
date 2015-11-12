<?php

namespace Tupi\SecurityBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

use InvalidArgumentException;
use Doctrine\ORM\NoResultException;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

use Tupi\AdminBundle\Commom\Util;
use Tupi\AdminBundle\Entity\CrudRepository;


/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends CrudRepository implements UserProviderInterface, ContainerAwareInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}
	
	public function encryptPass(User $user) 
	{
		//criptrografando a senha
		$encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
		$user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));
	}
	
	public function loadUserByEmail($email)
	{	
		$qb = $this->createQueryBuilder('u')
		->select('u')
		->where('u.email = :email')
		->setParameter('email', $email)
		->getQuery();
		
		$user = null;
		try {
			$user = $qb->getSingleResult();
		} catch (NoResultException $e) {
			$message = sprintf('Não foi possível localizar a conta "%s".', $email);
			throw new InvalidArgumentException($message, 0, $e);
		}
		
		return $user;
	}
	
	public function loadUserByUsername($username)
	{
		$qb = $this->createQueryBuilder('u')
				->select('u')
				->where('u.login = :login OR u.email = :email')
		->setParameter('login', $username)
		->setParameter('email', $username)
		->getQuery();
	
		try {
			// The Query::getSingleResult() method throws an exception
			// if there is no record matching the criteria.
			$user = $qb->getSingleResult();
		} catch (NoResultException $e) {
			$message = sprintf(
					'Unable to find an active admin TupiUserBundle:User object identified by "%s".',
					$username
			);
			throw new UsernameNotFoundException($message, Util::AUTH_ERROR, $e);
		}
	
		return $user;
	}
	
	public function refreshUser(UserInterface $user)
	{
		$class = get_class($user);
		if (!$this->supportsClass($class)) {
			throw new UnsupportedUserException(
					sprintf(
							'Instances of "%s" are not supported.',
							$class
					)
			);
		}
	
		return $this->find($user->getId());
	}
	
	public function supportsClass($class)
	{
		return $this->getEntityName() === $class
		|| is_subclass_of($class, $this->getEntityName());
	}
}

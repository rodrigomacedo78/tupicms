<?php
namespace Internit\InteressadoBundle\Controller;

use Tupi\AdminBundle\Controller\CrudController;
use Tupi\AdminBundle\Controller\ReturnVal;
use Doctrine\ORM\EntityManager;
use Internit\InteressadoBundle\Form\SubjectType;
use Internit\InteressadoBundle\Entity\InteressadoSubject;
use Tupi\AdminBundle\Types\StatusType;

class SubjectController extends CrudController
{
    const REPOSITORY_NAME = 'InternitInteressadoBundle:InteressadoSubject';
    
    protected $repositoryName = self::REPOSITORY_NAME;
    
    protected $bundleName = 'InternitInteressadoBundle:Subject';
    
    protected $defaultRoute = 'tupi_subjectInteressado_home';
    
    protected function createTypedForm($type)
    {
    	return $this->createForm(new SubjectType($this->getDoctrine()->getManager()), $type);
    }
    
    protected function initObject($id = null) 
    {
        $subject = new InteressadoSubject();
        if(!empty($id)) {
            $subject = $this->getRepository()->findOneBy(array('id' => $id));
        }
        
        return $subject;
    }   
    
    protected function save(ReturnVal $return, $id = null, $obj, $form, EntityManager $em)
    {
        //criar um novo assunto
        if(is_null($obj->getId())) {
            $em->persist($obj);
            $return->setMessage('Assunto cadastrado com sucesso!');
        }
        //alterar
        else {
            $em->merge($obj);
            $return->setMessage('Assunto alterado com sucesso!');
        }
    }
}
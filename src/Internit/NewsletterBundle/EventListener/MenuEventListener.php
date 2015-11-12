<?php
namespace Internit\NewsletterBundle\EventListener;

use Tupi\AdminBundle\Menu\MenuCreator;
use Tupi\AdminBundle\Menu\BuildEvent;


class MenuEventListener implements MenuCreator
{
    
    public function onCreate(BuildEvent $event)
    {
        $event->getMenu()->addChild('Newsletter', array('route' => 'newsletter_home'));
    }
}
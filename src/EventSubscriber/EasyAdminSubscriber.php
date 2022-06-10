<?php
namespace App\EventSubscriber;

use App\Entity\BlogPost;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setProjectUser'],
        ];
    }

    public function setProjectUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Project)) {
            return;
        }

        $user = $this->security->getUser();
        $entity->setUser($user);
    }
}
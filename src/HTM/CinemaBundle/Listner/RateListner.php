<?php

namespace HTM\CinemaBundle\Listner;

use HTM\CinemaBundle\Event\VoteUpdateEvent;

class RateListner
{
    protected $updateStars;
    protected $em;
    protected $repository;
    
    public function __construct(\Doctrine\ORM\EntityManager $em, UpdateStars $p_updateStars)
    {
        $this->updateStars = $p_updateStars;
        $this->em = $em;
    }
    
    public function processRate(VoteUpdateEvent $p_event)
    {
        $this->updateStars->mettreAJourRate($p_event->getStars(), $p_event->getIdfilm(), $this->em);
    }
}

?>
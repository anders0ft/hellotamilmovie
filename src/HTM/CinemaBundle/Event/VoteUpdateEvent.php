<?php

namespace HTM\CinemaBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class VoteUpdateEvent extends Event
{
    protected $idFilm;
    protected $stars;
    
    public function __construct($idFilm, $stars)
    {
        $this->idFilm = $idFilm;
        $this->stars = $stars;
    }
    
    public function getStars()
    {
        return $this->stars;
    }
    
    public function setStars($stars)
    {
        return $this->stars = $stars;
    }
    
    public function getIdfilm()
    {
        return $this->idFilm;
    }
}

?>
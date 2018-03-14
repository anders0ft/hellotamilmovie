<?php

namespace HTM\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="HTM\CinemaBundle\Repository\VoteRepository")
 */
class Vote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="HTM\CinemaBundle\Entity\Film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float", nullable=true)
     */
    private $rate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rate
     *
     * @param float $rate
     *
     * @return Vote
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set film
     *
     * @param \HTM\CinemaBundle\Entity\Film $film
     *
     * @return Vote
     */
    public function setFilm(\HTM\CinemaBundle\Entity\Film $film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \HTM\CinemaBundle\Entity\Film
     */
    public function getFilm()
    {
        return $this->film;
    }
}

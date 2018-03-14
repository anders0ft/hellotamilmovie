<?php

namespace HTM\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="HTM\CinemaBundle\Repository\FilmRepository")
 */
class Film
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="actors", type="string", length=255)
     */
    private $actors;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=255)
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=10)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=15)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="commingsoon", type="boolean")
     */
    private $commingsoon;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="incinema", type="boolean")
     */
    private $incinema;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="shortfilm", type="boolean")
     */
    private $shortfilm;
    
    /**
     * @var float
     *
     * @ORM\Column(name="stars", type="float")
     */
    private $stars;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagemain", type="string", length=50)
     */
    private $imagemain;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagesingleview", type="string", length=50)
     */
    private $imagesingleview;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagenow", type="string", length=50)
     */
    private $imagenow;


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
     * Set name
     *
     * @param string $name
     *
     * @return Film
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Film
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Film
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set actors
     *
     * @param string $actors
     *
     * @return Film
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set director
     *
     * @param string $director
     *
     * @return Film
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return Film
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return Film
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set commingsoon
     *
     * @param boolean $commingsoon
     *
     * @return Film
     */
    public function setCommingsoon($commingsoon)
    {
        $this->commingsoon = $commingsoon;

        return $this;
    }

    /**
     * Get commingsoon
     *
     * @return boolean
     */
    public function getCommingsoon()
    {
        return $this->commingsoon;
    }

    /**
     * Set incinema
     *
     * @param boolean $incinema
     *
     * @return Film
     */
    public function setIncinema($incinema)
    {
        $this->incinema = $incinema;

        return $this;
    }

    /**
     * Get incinema
     *
     * @return boolean
     */
    public function getIncinema()
    {
        return $this->incinema;
    }

    /**
     * Set shortfilm
     *
     * @param boolean $shortfilm
     *
     * @return Film
     */
    public function setShortfilm($shortfilm)
    {
        $this->shortfilm = $shortfilm;

        return $this;
    }

    /**
     * Get shortfilm
     *
     * @return boolean
     */
    public function getShortfilm()
    {
        return $this->shortfilm;
    }

    /**
     * Set stars
     *
     * @param float $stars
     *
     * @return Film
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return float
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set imagemain
     *
     * @param string $imagemain
     *
     * @return Film
     */
    public function setImagemain($imagemain)
    {
        $this->imagemain = $imagemain;

        return $this;
    }

    /**
     * Get imagemain
     *
     * @return string
     */
    public function getImagemain()
    {
        return $this->imagemain;
    }

    /**
     * Set imagesingleview
     *
     * @param string $imagesingleview
     *
     * @return Film
     */
    public function setImagesingleview($imagesingleview)
    {
        $this->imagesingleview = $imagesingleview;

        return $this;
    }

    /**
     * Get imagesingleview
     *
     * @return string
     */
    public function getImagesingleview()
    {
        return $this->imagesingleview;
    }

    /**
     * Set imagenow
     *
     * @param string $imagenow
     *
     * @return Film
     */
    public function setImagenow($imagenow)
    {
        $this->imagenow = $imagenow;

        return $this;
    }

    /**
     * Get imagenow
     *
     * @return string
     */
    public function getImagenow()
    {
        return $this->imagenow;
    }
}

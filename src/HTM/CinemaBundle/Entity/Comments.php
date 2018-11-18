<?php

namespace HTM\CinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="HTM\CinemaBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="HTM\CinemaBundle\Entity\Film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="HTM\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="HTM\CinemaBundle\Entity\Comments", mappedBy="parent")
     * @ORM\JoinColumn(nullable=true)
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="HTM\CinemaBundle\Entity\Comments", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=255)
     */
    private $ipaddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set film
     *
     * @param \HTM\CinemaBundle\Entity\Film $film
     *
     * @return Comments
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

    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     *
     * @return Comments
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set user
     *
     * @param \HTM\UserBundle\Entity\User $user
     *
     * @return Comments
     */
    public function setUser(\HTM\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HTM\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comments
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
     * Set parent
     *
     * @param \HTM\CinemaBundle\Entity\Comments $parent
     *
     * @return Comments
     */
    public function setParent(\HTM\CinemaBundle\Entity\Comments $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \HTM\CinemaBundle\Entity\Comments
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child
     *
     * @param \HTM\CinemaBundle\Entity\Comments $child
     *
     * @return Comments
     */
    public function addChild(\HTM\CinemaBundle\Entity\Comments $child)
    {
        $this->children[] = $child;
        // On lie son parent
        $child->setParent($this);

        return $this;
    }

    /**
     * Remove child
     *
     * @param \HTM\CinemaBundle\Entity\Comments $child
     */
    public function removeChild(\HTM\CinemaBundle\Entity\Comments $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }
}

<?php

namespace FS\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Survey
 */
class Survey
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $iceCream;

    /**
     * @var string
     */
    private $superHero;

    /**
     * @var string
     */
    private $movieStar;

    /**
     * @var \DateTime
     */
    private $worldEnd;

    /**
     * @var string
     */
    private $superBowl;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \FS\Bundle\CoreBundle\Entity\User
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set iceCream
     *
     * @param string $iceCream
     *
     * @return Survey
     */
    public function setIceCream($iceCream)
    {
        $this->iceCream = $iceCream;

        return $this;
    }

    /**
     * Get iceCream
     *
     * @return string 
     */
    public function getIceCream()
    {
        return $this->iceCream;
    }

    /**
     * Set superHero
     *
     * @param string $superHero
     *
     * @return Survey
     */
    public function setSuperHero($superHero)
    {
        $this->superHero = $superHero;

        return $this;
    }

    /**
     * Get superHero
     *
     * @return string 
     */
    public function getSuperHero()
    {
        return $this->superHero;
    }

    /**
     * Set movieStar
     *
     * @param string $movieStar
     *
     * @return Survey
     */
    public function setMovieStar($movieStar)
    {
        $this->movieStar = $movieStar;

        return $this;
    }

    /**
     * Get movieStar
     *
     * @return string 
     */
    public function getMovieStar()
    {
        return $this->movieStar;
    }

    /**
     * Set worldEnd
     *
     * @param \DateTime $worldEnd
     *
     * @return Survey
     */
    public function setWorldEnd($worldEnd)
    {
        $this->worldEnd = $worldEnd;

        return $this;
    }

    /**
     * Get worldEnd
     *
     * @return \DateTime 
     */
    public function getWorldEnd()
    {
        return $this->worldEnd;
    }

    /**
     * Set superBowl
     *
     * @param string $superBowl
     *
     * @return Survey
     */
    public function setSuperBowl($superBowl)
    {
        $this->superBowl = $superBowl;

        return $this;
    }

    /**
     * Get superBowl
     *
     * @return string 
     */
    public function getSuperBowl()
    {
        return $this->superBowl;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Survey
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Survey
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Survey
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \FS\Bundle\CoreBundle\Entity\User $user
     *
     * @return Survey
     */
    public function setUser(\FS\Bundle\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FS\Bundle\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

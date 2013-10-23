<?php

namespace FS\Bundle\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var boolean
     */
    private $surveyed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $surveys;

    public function __construct()
    {
        $this->surveyed = null;
        $this->surveys = new ArrayCollection();
        $this->active = true;
    }

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
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
     * @var string
     */
    private $shoeSize;


    /**
     * Set shoeSize
     *
     * @param string $shoeSize
     *
     * @return User
     */
    public function setShoeSize($shoeSize)
    {
        $this->shoeSize = $shoeSize;

        return $this;
    }

    /**
     * Get shoeSize
     *
     * @return string 
     */
    public function getShoeSize()
    {
        return $this->shoeSize;
    }
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * @return User
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
     * Add surveys
     *
     * @param \FS\Bundle\CoreBundle\Entity\Survey $surveys
     *
     * @return User
     */
    public function addSurvey(\FS\Bundle\CoreBundle\Entity\Survey $surveys)
    {
        $this->surveys[] = $surveys;

        return $this;
    }

    /**
     * Remove surveys
     *
     * @param \FS\Bundle\CoreBundle\Entity\Survey $surveys
     */
    public function removeSurvey(\FS\Bundle\CoreBundle\Entity\Survey $surveys)
    {
        $this->surveys->removeElement($surveys);
    }

    /**
     * Get surveys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSurveys()
    {
        return $this->surveys;
    }

    /**
     * Set surveyed
     *
     * @param boolean $surveyed
     *
     * @return User
     */
    public function setSurveyed($surveyed)
    {
        $this->surveyed = $surveyed;

        return $this;
    }

    /**
     * Get surveyed
     *
     * @return boolean 
     */
    public function getSurveyed()
    {
        return $this->surveyed;
    }
}

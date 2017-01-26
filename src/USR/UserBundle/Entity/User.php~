<?php

namespace USR\UserBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usr_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string $age
     
     * @ORM\Column(name="age", type="string", length=255, nullable=true)
    
     */
    
     protected $age;
    
    /**
     * @var string $famille
     
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
    
     */
    protected $famille;
    
    /**
     * @var string $nourriture
     
     * @ORM\Column(name="bourriture", type="string", nullable=true, length=255)
    
     */
    protected $nourriture;
    
    /**
     * @var string $race
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    protected $race;
    
   /**
   * @ORM\ManyToMany(targetEntity="USR\UserBundle\Entity\User", cascade={"persist"})
   */
    protected $users;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Add bonobo
     *
     * @param \USR\UserBundle\Entity\User $bonobo
     *
     * @return User
     */
    public function addBonobo(\USR\UserBundle\Entity\User $bonobo)
    {
        $this->users[] = $bonobo;

        return $this;
    }

    /**
     * Remove bonobo
     *
     * @param \USR\UserBundle\Entity\User $bonobo
     */
    public function removeBonobo(\USR\UserBundle\Entity\User $bonobo)
    {
        $this->users->removeElement($bonobo);
    }

    /**
     * Get bonobos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBonobos()
    {
        return $this->users;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return User
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
     * Set famille
     *
     * @param string $famille
     *
     * @return User
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set nourriture
     *
     * @param string $nourriture
     *
     * @return User
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get nourriture
     *
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return User
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Add user
     */
    public function addUser($user)
    {
        $this->users[] = $user;

    }

    /**
     * Remove user
     *
     * 
     */
    public function removeUser($user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}

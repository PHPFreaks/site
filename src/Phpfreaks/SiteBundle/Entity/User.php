<?php

namespace Phpfreaks\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Phpfreaks\SiteBundle\Entity\User
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Phpfreaks\SiteBundle\Entity\UserRepository")
 */
class User implements UserInterface
    {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $connect_id = 0;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author")
     */
    protected $articles;

    public function __construct()
    {
        $this->isActive = true;
    }

    public function getUsername( )
    {
        return $this->username;
    }

    public function getPassword( )
    {
        return $this->password;
    }

    public function getSalt( )
    {
        return $this->salt;
    }

    public function getEmail( )
    {
        return $this->email;
    }

    public function getIsActive( )
    {
        return (bool) $this->isActive;
    }

    public function getRoles( )
    {
        return;
    }

    public function eraseCredentials( )
    {
        return;
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Set connect_id
     *
     * @param integer $connectId
     * @return User
     */
    public function setConnectId(\integer $connectId)
    {
        $this->connect_id = $connectId;
    
        return $this;
    }

    /**
     * Get connect_id
     *
     * @return integer unsigned 
     */
    public function getConnectId()
    {
        return $this->connect_id;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Add articles
     *
     * @param \Phpfreaks\SiteBundle\Entity\Article $articles
     * @return User
     */
    public function addArticle(\Phpfreaks\SiteBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;
    
        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Phpfreaks\SiteBundle\Entity\Article $articles
     */
    public function removeArticle(\Phpfreaks\SiteBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
<?php

namespace Phpfreaks\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Phpfreaks\SiteBundle\Entity\Article
 *
 * @ORM\Entity
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Phpfreaks\SiteBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Item", cascade={"persist"})
     * @ORM\JoinColumn(name="item", referencedColumnName="id")
     */
    private $item;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $slug = '';

    // @TODO: Add Tags
    // @TODO: Add Categories
    // @TODO: Add Comments
    // @TODO: Add Ratings & Averages

    public function __construct()
    {

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
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set item
     *
     * @param \Phpfreaks\SiteBundle\Entity\Item $item
     * @return Article
     */
    public function setItem(\Phpfreaks\SiteBundle\Entity\Item $item = null)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return \Phpfreaks\SiteBundle\Entity\Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set author
     *
     * @param \Phpfreaks\SiteBundle\Entity\User $author
     * @return Article
     */
    public function setAuthor(\Phpfreaks\SiteBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Phpfreaks\SiteBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
<?php

namespace Phpfreaks\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Phpfreaks\SiteBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(name="entity_items")
 * @ORM\Entity(repositoryClass="Phpfreaks\SiteBundle\Entity\ItemRepository")
 * @Gedmo\Loggable
 */
class Item
{
    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title = '';

    /**
     * @ORM\Column(type="text")
     * @Gedmo\Versioned
     */
    protected $content;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @ORM\Column(name="dateDeleted", type="datetime", nullable=true)
     */
    private $dateDeleted = null;

    /**
     *
     */
    public function __construct( )
    {

    }

    /**
     * Get id
     *
     * @return \bigint
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return BaseEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return BaseEntity
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return BaseEntity
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return BaseEntity
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    
        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set dateDeleted
     *
     * @param \DateTime $dateDeleted
     * @return BaseEntity
     */
    public function setDateDeleted($dateDeleted)
    {
        $this->dateDeleted = $dateDeleted;
    
        return $this;
    }

    /**
     * Get dateDeleted
     *
     * @return \DateTime 
     */
    public function getDateDeleted()
    {
        return $this->dateDeleted;
    }

}
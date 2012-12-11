<?php

namespace Phpfreaks\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Phpfreaks\SiteBundle\Entity\Content
 *
 * @ORM\MappedSuperclass
 * @Gedmo\Loggable
 */
class Content
{
    /**
     * @var $id
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var $title
     *
     * @Assert\NotBlank(message="You cannot leave the title blank")
     * @Assert\NotNull(message="You cannot leave the title null")
     * @Assert\MinLength(limit=5, message="Your title should be at least 5 characters in length")
     * @Assert\MaxLength(limit=255, message="Your title cannot be longer than 255 characters")
     *
     * @ORM\Column(type="string", length=255)
     */
    private $title = '';

    /**
     * @var $content
     *
     * @Assert\NotBlank(message="You cannot leave the content blank")
     * @Assert\NotNull(message="You cannot leave the content null")
     *
     * @ORM\Column(type="text")
     * @Gedmo\Versioned
     */
    private $content;

    /**
     * @var $slug
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $slug;

    /**
     * @var $dateCreated
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @var $dateUpdated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @var $dateDeleted
     *
     * @ORM\Column(name="dateDeleted", type="datetime", nullable=true)
     */
    private $dateDeleted = null;

    /**
     * @var $author
     *
     * @Assert\NotNull(message="There needs to be an author to this content")
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

    /**
     * @var $category
     *
     * @Assert\NotNull(message="You need to select a category")
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

    // @TODO: Add Tags
    // @TODO: Add Comments
    // @TODO: Add Ratings & Averages

    /**
     * Constructor
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


    /**
     * Get slug
     *
     * @return \varchar
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Content
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Set author
     *
     * @param \Phpfreaks\SiteBundle\Entity\User $author
     * @return Content
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

    /**
     * Set category
     *
     * @param \Phpfreaks\SiteBundle\Entity\Category $category
     * @return Content
     */
    public function setCategory(\Phpfreaks\SiteBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Phpfreaks\SiteBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
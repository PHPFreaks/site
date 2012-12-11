<?php

namespace Phpfreaks\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Phpfreaks\SiteBundle\Entity\Category
 *
 * @ORM\Entity
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="Phpfreaks\SiteBundle\Entity\CategoryRepository")
 */
class Category
{

    /**
     * @var $id
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var $title
     *
     * @Assert\NotBlank(message="You cannot leave the category title blank")
     * @Assert\NotNull(message="You cannot leave the category title null")
     * @Assert\MinLength(limit=3, message="Your category name should be at least 3 characters in length")
     * @Assert\MaxLength(limit=64, message="Your category name cannot be longer than 255 characters")
     *
     * @ORM\Column(type="string", length=64)
     */
    private $title;

    /**
     * @var $slug
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $slug;


    /**
     * Get id
     *
     * @return \integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
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
     * Set title
     *
     * @param string $title
     * @return Category
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
}
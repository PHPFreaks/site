<?php

namespace Phpfreaks\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

use Phpfreaks\SiteBundle\Entity\Content;

/**
 * Phpfreaks\SiteBundle\Entity\Article
 *
 * @ORM\Entity
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Phpfreaks\SiteBundle\Entity\ArticleRepository")
 */
class Article extends Content
{

    /**
     * @var $tags
     *
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    public function __construct()
    {
        parent::__construct();
    }
    

    /**
     * Add tags
     *
     * @param \Phpfreaks\SiteBundle\Entity\Tag $tag
     * @return Article
     */
    public function addTag(\Phpfreaks\SiteBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Phpfreaks\SiteBundle\Entity\Tag $tags
     */
    public function removeTag(\Phpfreaks\SiteBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
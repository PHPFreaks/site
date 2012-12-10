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

    public function __construct()
    {
        parent::__construct();
    }
    
}
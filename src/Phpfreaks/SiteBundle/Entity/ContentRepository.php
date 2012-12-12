<?php

namespace Phpfreaks\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Content Repository
 */
abstract class ContentRepository extends EntityRepository
{
    /**
     * @param int $limit
     * @return array Latest Results
     */
    public function getLatestContent($limit = 10)
    {
        $limit = (int) $limit;

        // Grab the entities, ordered by date created (newest first)
        $query = $this->getEntityManager()
            ->createQuery('SELECT c FROM ' . static::ENTITY_NAME . ' c ORDER BY c.dateCreated DESC');

        // If we need to add a limit, do so
        if($limit > 0)
        {
            $query->setMaxResults($limit);
        }

        // Return our results
        return $query->getResult();
    }
}

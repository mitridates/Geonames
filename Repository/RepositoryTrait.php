<?php

namespace App\Geonames\Repository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

trait RepositoryTrait
{
    public function countAll(): int
    {
        $ret= 0;
        $qb = $this->createQueryBuilder('foo');
        $qb->select('count(foo)');
        try {
            $ret= $qb->getQuery()->getSingleScalarResult();
        } catch (NoResultException|NonUniqueResultException) {
        }
        return $ret;
    }

    /**
     * Get database registry by id or Entity
     *
     * @param string|object $identifier
     * @return null|object
     */
    public function getRegistry($identifier)
    {
        return gettype($identifier)==='object' ? $this->find($identifier->getId()) : $this->find($identifier);
    }
}

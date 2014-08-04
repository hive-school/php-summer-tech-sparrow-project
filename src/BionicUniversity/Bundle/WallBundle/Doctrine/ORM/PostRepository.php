<?php

namespace BionicUniversity\Bundle\WallBundle\Doctrine\ORM;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    public function getFeed($communities, $users, $me)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->select('p')
            ->andWhere($queryBuilder->expr()->in('p.community', '?1'))
            ->orWhere($queryBuilder->expr()->in('p.author', '?2'))
            ->andWhere('p.author != :me')
            ->setParameters(['1' => $communities, '2' => $users, 'me' => $me]);
        return $queryBuilder->getQuery()->getResult();
    }
}

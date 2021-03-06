<?php

namespace AppBundle\Entity;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;
/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function findApi($id = null)
    {
        $qb = $this->createQueryBuilder('u');
        if( null !== $id){
            $qb
                ->where('u.id = :id')
                ->setParameter(':id', $id)
            ;
        }
        return  null === $id ? $qb->getQuery()->getArrayResult() : $qb->getQuery()->getSingleResult(AbstractQuery::HYDRATE_ARRAY);
    }
}

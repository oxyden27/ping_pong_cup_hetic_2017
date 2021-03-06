<?php

namespace HETIC\CoreBundle\Repository;

use HETIC\CoreBundle\Entity\Startup;

/**
 * StartupRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StartupRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllActive() {
        return $this->createQueryBuilder('s')
                ->where('s.status = :active')
                ->setParameter(':active', Startup::STATUS_ACTIVE)
                ->getQuery()
                ->getResult()
        ;
    }

    public function findActive($id) {
        return $this->createQueryBuilder('s')
                ->where('s.id = :id')
                ->andWhere('s.status = :active')
                ->setParameter(':id', $id)
                ->setParameter(':active', Startup::STATUS_ACTIVE)
                ->getQuery()
                ->getOneorNullResult()
        ;
    }
}

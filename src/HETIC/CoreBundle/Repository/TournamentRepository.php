<?php

namespace HETIC\CoreBundle\Repository;

/**
 * TournamentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TournamentRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllByDate($date) {
        return $this->createQueryBuilder('t')
                ->where('t.endDate < :date')
                ->setParameter(':date', $date)
                ->getQuery()
                ->getResult()
        ;
    }
}

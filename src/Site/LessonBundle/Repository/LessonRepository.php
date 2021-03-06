<?php

namespace Site\LessonBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * LessonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LessonRepository extends DocumentRepository
{
	public function findAllByOrder($skip,$limit)
	{
		return $this->createQueryBuilder()
		       ->sort('order', 'ASC')
		       ->skip($skip)
		       ->limit($limit)
               ->getQuery()
               ->execute();
	}
	public function findLimitByType($type,$skip,$limit)
	{
		return $this->createQueryBuilder()
		       ->sort('order', 'ASC')
		       ->field('type.$id')->equals($type->getId())
		       ->skip($skip)
		       ->limit($limit)
               ->getQuery()
               ->execute();
	}
	public function findAllByLearn()
	{
		return $this->createQueryBuilder()
		       ->sort('learn', 'DESC')
		       ->limit(8)
               ->getQuery()
               ->execute();
	}
}
<?php

namespace HTM\CinemaBundle\Repository;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAllFilm()
	{
		return $this->createQueryBuilder('f')
					->orderBy('f.stars', 'DESC')
					->getQuery()
					->getResult();
	}
	
	public function findFilmByStars()
	{
		return $this->createQueryBuilder('f')
					->orderBy('f.stars', 'DESC')
					->setMaxResults(6)
					->getQuery()
					->getResult();
	}
	
	public function findFilmById($id)
	{
		return $this->createQueryBuilder('f')
					->where('f.id = :id')
					->setParameter('id', $id)
					->getQuery()
					->getResult();
	}
	
	public function findFilmByInCinema()
	{
		return $this->createQueryBuilder('f')
					->where('f.incinema = :incinema')
					->setParameter('incinema', 1)
					->getQuery()
					->getResult();
	}
}

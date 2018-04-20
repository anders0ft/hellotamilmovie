<?php

namespace HTM\CinemaBundle\Repository;

/**
 * VoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteRepository extends \Doctrine\ORM\EntityRepository
{
	public function findByUserAndFilm($idUser, $idFilm)
	{
		return $this->createQueryBuilder('v')
					->select("v.id")
					->where('v.user = :user AND v.film = :film')
					->setParameters(array('user'=>$idUser,'film'=>$idFilm))
					->getQuery()
					->getResult();
	}
	
	public function findRateByUserAndFilm($idUser, $idFilm)
	{
		return $this->createQueryBuilder('v')
					->select("v.rate")
					->where('v.user = :user AND v.film = :film')
					->setParameters(array('user'=>$idUser,'film'=>$idFilm))
					->getQuery()
					->getResult();
	}
}

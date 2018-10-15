<?php

namespace HTM\CinemaBundle\Listner;
use HTM\CinemaBundle\Entity\Film;
use \Symfony\Component\HttpFoundation\JsonResponse;

class UpdateStars
{
    /**
     * Elle est appelée par RateListner lors d'un vote par un utilisateur connecté pour
     * mettre à jour le champ Film.stars
     * @param $p_rate
     * @param $p_idFilm
     * @param \Doctrine\ORM\EntityManager $em
     * @return JsonResponse
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function mettreAJourRate($p_rate, $p_idFilm, \Doctrine\ORM\EntityManager $em)
    {
        $repositoryVote = $em->getRepository('HTMCinemaBundle:Vote');
        $repositoryFilm = $em->getRepository('HTMCinemaBundle:Film');
        $film = $repositoryFilm->find(intval($p_idFilm));

        $avgRate = $repositoryVote->getAvgRate($p_idFilm);


        if (!empty($avgRate[0][1]))
        {
            $avgRate = round($avgRate[0][1], 1);

            $film->setStars($avgRate);
            $em->flush();
            return new JsonResponse(['message' => "STARS SAVED"]);
        }
    }
}

?>
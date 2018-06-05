<?php

namespace HTM\CinemaBundle\Listner;

class UpdateStars
{ 
    public function mettreAJourRate($p_rate, $p_idFilm, \Doctrine\ORM\EntityManager $em)
    {
        $repositoryVote = $em->getRepository('HTMCinemaBundle:Vote');
        $repositoryFilm = $em->getRepository('HTMCinemaBundle:Film');
        $films = $repositoryFilm->findFilmById("1");

        $avgRate = $repositoryVote->getAvgRate($p_idFilm);
        var_dump($films);exit;
        if (!empty($avgRate[0][1]))
        {
            $avgRate = round($avgRate[0][1], 1);
            var_dump($avgRate);exit;
        }
    }
}

?>
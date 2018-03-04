<?php

namespace HTM\CinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CinemaController extends Controller
{
    public function movieAction()
    {
    	$listFilm = $this->getDoctrine()
				    	->getManager()
				    	->getRepository('HTMCinemaBundle:Film')
				    	->findAllFilm();
    	
        return $this->render('HTMCinemaBundle:Cinema:film.html.twig', array('list_film' => $listFilm));
    }
    
    public function singleAction($id)
    {
    	$film = $this->getDoctrine()
			    	->getManager()
			    	->getRepository('HTMCinemaBundle:Film')
			    	->findFilmByID($id);
    	
    	return $this->render('HTMCinemaBundle:Cinema:single.html.twig');
    }
    
    public function photosvideosAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:photosvideos.html.twig');
    }
    
    public function commingsoonAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:commingsoon.html.twig');
    }
    
    public function mostdiscussedAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:mostdiscussed.html.twig');
    }
    
    public function commentsAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:comments.html.twig');
    }
    
    public function sliderAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:slider.html.twig');
    }
    
    public function todayschoiceAction()
    {
    	$listFilm = $this->getDoctrine()
				    	->getManager()
				    	->getRepository('HTMCinemaBundle:Film')
				    	->findFilmByStars();
    	
    	$cssMobile = array(0 => "",
    						1 => "second--item",
    						2 => "third--item",
    						3 => "hidden-xs",
    						4 => "hidden-xs hidden-sm",
    						5 => "hidden-xs hidden-sm");
    	
    	return $this->render('HTMCinemaBundle:Cinema:todayschoice.html.twig', array('list_film' => $listFilm, 'cssmobile' => $cssMobile));
    }
    
    public function nowincinemaAction()
    {
    	$filmInCinema = $this->getDoctrine()
				    	->getManager()
				    	->getRepository('HTMCinemaBundle:Film')
				    	->findFilmByInCinema();
    	
    	return $this->render('HTMCinemaBundle:Cinema:nowincinema.html.twig', array('film_in_cinema' =>  $filmInCinema));
    }
    
    public function newsAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:news.html.twig');
    }
}

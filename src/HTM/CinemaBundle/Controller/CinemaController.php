<?php

namespace HTM\CinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\BrowserKit\Request;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\JsonResponse;
use HTM\CinemaBundle\Entity\Vote;
use HTM\CinemaBundle\Entity\Film;

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
    	
    	return $this->render('HTMCinemaBundle:Cinema:single.html.twig', array('film' => $film));
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
    	
    	$cssContent = array();
    	$j = $k = 0;
    	for($i=0; $i<10; $i++)
    	{
    		if($j == 4)
    			$j = 0;
    		
    		if($j < 2) {
    			if ($j == 0)
    				$cssContent[] = "movie--test--dark movie--test--left";
    			else
    				$cssContent[] = "movie--test--light movie--test--left";
    		}
    		else {
    			if($j == 2)
    				$cssContent[] = "movie--test--light movie--test--right";
    			else 
    				$cssContent[] = "movie--test--dark movie--test--right";
    		}
    		$j++;
    	}
    	
		return $this->render('HTMCinemaBundle:Cinema:nowincinema.html.twig', array('film_in_cinema' =>  $filmInCinema, 'cssmobile' => $cssContent));
    }
    
    public function newsAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:news.html.twig');
    }
    
    public function voteAction(Request $request)
    {
    	extract($_POST);
    	if ($request->isMethod('POST') and $request->isXmlHttpRequest())
    	{
    		$em = $this->getDoctrine()->getManager();
    		$vote = new Vote();
    		$vote->setFilm($em->getReference('HTMCinemaBundle:Film', $id));
    		$vote->setRate($rate);
    		$em->persist($vote);
    		$em->flush();
    		return new JsonResponse(['message' => "SUCCES"]);
    	}
    	else 
    	{
    		throw new NotFoundHttpException();
    	}
    	
    }
}






















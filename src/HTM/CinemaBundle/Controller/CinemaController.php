<?php

namespace HTM\CinemaBundle\Controller;


use HTM\CinemaBundle\Entity\Comments;
use HTM\CinemaBundle\Form\CommentsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\JsonResponse;
use HTM\CinemaBundle\Entity\Vote;
use HTM\CinemaBundle\Event\VoteUpdateEvent;
use HTM\CinemaBundle\Event\CinemaEvents;
use HTM\CinemaBundle\Repository\VoteRepository;



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
    	/*if(!$this->get('security.authorization_checker')->isGranted('ROLE_AUTEUR'))
    	{
    		// Sinon on déclenche une exception « Accès interdit »
    		throw new AccessDeniedException('Accès limité aux auteurs.');
    	}*/
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

    /**
     * Action sera appelée lors d'ajout d'un commentaire
     * @param Request $request
     * @param $iIdFilm
     * @param $iIdCommentParent
     * @param $bVisible
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function commentsAction(Request $request, $iIdFilm, $iIdCommentParent=null, $bVisible=true)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = new Comments();

        $film = $em->getReference('HTMCinemaBundle:Film', $iIdFilm);
        $comment->setFilm($film);

        if (!empty($iIdCommentParent)){
            $comment->setParent($em->getReference('HTMCinemaBundle:Comments', $iIdCommentParent));
            $aParamRoute = array('iIdFilm' => $iIdFilm, 'iIdCommentParent' => $iIdCommentParent);
        }else{
            // with default ParentId to avoid Routing Exception
            $aParamRoute = array('iIdFilm' => $iIdFilm, 'iIdCommentParent' => 0);
        }

        $form = $this->createForm(CommentsType::class, $comment, array('action' => $this->generateUrl('htm_movie_comment', $aParamRoute)));

        if ($form->handleRequest($request)->isValid() && $request->isMethod('POST')){

            $user = $this->getUser();
            if($user == null) {
                return $this->redirect($this->generateUrl('fos_user_security_login'));
            }else {
                $film = $em->getReference('HTMCinemaBundle:Film', $iIdFilm);
                $comment->setFilm($film);
                $comment->setUser($user);
                // On récupère l'adresse IP d'utilisateur
                $addressIp = $request->getClientIp();
                $comment->setIpaddress($addressIp);

                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'your comment successfully posted !');

                // Redirection si tout est OK
                return $this->redirect($this->generateUrl('htm_movie_singlepage', array('id' => $iIdFilm)));
            }
        }

        // On envoit le formulaire à la vue
    	return $this->render('HTMCinemaBundle:Cinema:comments.html.twig', array('form' => $form->createView(), 'actif' => $bVisible, 'parent_id' => $iIdCommentParent));
    }

    public function commentsListAction(Request $request, $iIdFilm, $iIdCommentParent=null)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getReference('HTMCinemaBundle:Film', $iIdFilm);

        $commentsList = array();
        $commentsList = $em->getRepository('HTMCinemaBundle:Comments')->findBy(array('film' => $film), array('id' => 'DESC'));

        // Verification to active comment block during Reply Action
        if($request->isXmlHttpRequest()){
            if (!empty($iIdCommentParent)){
                return new JsonResponse(['parent_id' => $iIdCommentParent]);
            }else{
                return new JsonResponse(['parent_id' => "ERROR"]);
            }
        }

        return $this->render('HTMCinemaBundle:Cinema:commentslist.html.twig',
                                    array(  'comments_list' => $commentsList,
                                            'number_of_comments' => count($commentsList)));
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
    		if($j == 4){
    			$j = 0;
            }
    		
    		if($j < 2) {
    			if ($j == 0){
    				$cssContent[] = "movie--test--dark movie--test--left";
                }
    			else{
    				$cssContent[] = "movie--test--light movie--test--left";
                }
    		}
    		else {
    			if($j == 2){
    				$cssContent[] = "movie--test--light movie--test--right";
                }
    			else {
    				$cssContent[] = "movie--test--dark movie--test--right";
                }
    		}
    		$j++;
    	}
    	
		return $this->render('HTMCinemaBundle:Cinema:nowincinema.html.twig', array('film_in_cinema' =>  $filmInCinema, 'cssmobile' => $cssContent));
    }
    
    public function newsAction()
    {
    	return $this->render('HTMCinemaBundle:Cinema:news.html.twig');
    }

    /**
     * Cette action est lancée lorsque un utilisateur connecté vote
     * @param Request $request
     * @return JsonResponse
     */
    public function voteAction(Request $request)
    {
        // Getting id => idFilm and rate from POST
    	extract($_POST);

    	if ($request->isMethod('POST') and $request->isXmlHttpRequest()) {
    		$oUser = $this->getUser();
    		if($oUser == null) {
    			return new JsonResponse(array('message' => "LOGIN"));
    		}
    		else {

    			$iUserId = $oUser->getId();

                $oVote = $this->getDoctrine()
                                    ->getManager()
                                    ->getRepository('HTMCinemaBundle:Vote')
                                    ->findOneBy(array('user' => $iUserId, 'film' => $id));

                $iId = $oVote->getId();

    			$em = $this->getDoctrine()->getManager();
    			// Le cas où l'utilisateur n'a jamais voté pour ce film
    			if (empty($iId)) {
    				$vote = new Vote();
    				$vote->setFilm($em->getReference('HTMCinemaBundle:Film', $id));
    				$vote->setUser($oUser);
    				$vote->setRate($rate);
    				$em->persist($vote);
    			}
    			else {
    				$vote = $em->getRepository('HTMCinemaBundle:Vote')->find($iId);
    				$vote->setRate($rate);
    				$vote->setDate(new \DateTime());
    			}
    			$em->flush();

                // On crée l'évènement
                $event = new VoteUpdateEvent($id, $rate);
                // On déclenche l'évènement UPDATE_VOTE
                $this->get('event_dispatcher')->dispatch(CinemaEvents::UPDATE_VOTE, $event);
                return new JsonResponse(['message' => "SUCCES"]);
    		}
    	}
    	else {
    		throw new NotFoundHttpException();
    	}
    	
    }

    /**
     * Generate Stars using Raty JS
     * @param int $iIdFilm
     * @param int $iIdOtherUser -> Put null if you want to display Ration of user connected
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ratyAction($iIdFilm, $iIdOtherUser=null, $bUserConnected=false)
    {
        $oUser = $this->getUser();
        // Case for an user logged
        if (!empty($oUser) && $bUserConnected){

            $oVote = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('HTMCinemaBundle:Vote')
                            ->findOneBy(array('user' => $oUser->getId(), 'film' => $iIdFilm));

            $rate = $oVote->getRate();
            return $this->render('HTMCinemaBundle:Cinema:raty.html.twig', array('rate' => $rate, 'iIdFilm' => $iIdFilm, 'iIdUser' => $iIdOtherUser));

        } elseif (!empty($iIdOtherUser)){ // Case for an user id given in view

            $oUser = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('HTMUserBundle:User')
                            ->find($iIdOtherUser);

            $oVote = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('HTMCinemaBundle:Vote')
                            ->findOneBy(array('user' => $oUser->getId(), 'film' => $iIdFilm));

            $rate = $oVote->getRate();
            return $this->render('HTMCinemaBundle:Cinema:raty.html.twig', array('rate' => $rate, 'iIdFilm' => $iIdFilm, 'iIdUser' => $iIdOtherUser));

        } else { // Case for 0 Rate

            return $this->render('HTMCinemaBundle:Cinema:raty.html.twig', array('rate' => 0, 'iIdFilm' => $iIdFilm, 'iIdUser' => $iIdOtherUser));
        }
    }
}






















<?php

namespace HTM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('HTMCoreBundle:Core:index.html.twig');
    }
    
    public function menuAction()
    {
    	return $this->render('HTMCoreBundle:Core:menu.html.twig');
    }
    
    public function slideAction()
    {
    	$listSlide = $this	->getDoctrine()
					    	->getManager()
					    	->getRepository('HTMCoreBundle:Slide')
					    	->findSlide();
    
    	return $this->render('HTMCoreBundle:Core:slide.html.twig', array('list_slide' => $listSlide));
    }
    
    public function todayschoiceAction()
    {
    
    	return $this->render('HTMCoreBundle:Core:todayschoice.html.twig');
    }
}

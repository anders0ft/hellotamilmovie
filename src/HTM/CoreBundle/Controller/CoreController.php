<?php

namespace HTM\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use HTM\CoreBundle\Entity\Contact;
use HTM\CoreBundle\Form\ContactType;
use HTM\CoreBundle\HTMCoreBundle;
use HTM;

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
    
    public function contactAction(Request $request)
    {
    	$contact = new Contact();

    	// On récupère l'adresse IP d'utilisateur 
    	$addressIp = $request->getClientIp();
    	$contact->setIpaddress($addressIp);

    	// On crée le FormBuilder grâce au service form factory
        $form = $this->createForm(ContactType::class, $contact);

        $validForm = $form->handleRequest($request)->isValid();
        $postForm = $request->isMethod('POST');

        if ($validForm && $postForm){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'your message successfully sent');

            // Redirection si tout est OK
            return $this->redirect($this->generateUrl('htm_core_contact'));
        }
    	// On envoit le formulaire à la vure
    	return $this->render('HTMCoreBundle:Core:contact.html.twig', array('form' => $form->createView()));
    }
}

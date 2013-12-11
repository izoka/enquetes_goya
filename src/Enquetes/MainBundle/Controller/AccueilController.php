<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Utilisateur;
use Enquetes\MainBundle\Form\UtilisateurType;
use Enquetes\MainBundle\Form\FormHandler;
use Symfony\Component\Security\Core\SecurityContext;

class AccueilController extends Controller
{
    public function indexAction()
    {

        
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirect($this->generateUrl('enquetes_main_creation'));
    }

    $request = $this->getRequest();
    $session = $request->getSession();

    // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
    if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
      $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
      $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
      $session->remove(SecurityContext::AUTHENTICATION_ERROR);
    }


        $user = new Utilisateur();
        $form = $this->createForm(new UtilisateurType(),$user);
        $em = $this->getDoctrine()->getManager();
        
        $formHandler = new FormHandler($form,$this->get('request'),$em);
        
        if($formHandler->process()){
             return $this->redirect
                ($this->generateUrl('enquetes_main_accueil',
                        array('id'=>$user->getId() ) ) );
        }
    
        
        
        return $this->render('EnquetesMainBundle:Default:accueil.html.twig',
                array('form'=>$form->createView(),
      'last_username' => $session->get(SecurityContext::LAST_USERNAME),
      'error'         => $error,
        ));
        
    }
}

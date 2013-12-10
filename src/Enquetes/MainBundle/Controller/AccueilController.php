<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Utilisateur;
use Enquetes\MainBundle\Form\UtilisateurType;
use Enquetes\MainBundle\Form\FormHandler;

class AccueilController extends Controller
{
    public function indexAction()
    {
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
                array('form'=>$form->createView()));
        
    }
}

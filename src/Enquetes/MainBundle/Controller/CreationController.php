<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Form\EnqueteType;
use Enquetes\MainBundle\Form\FormHandler;
class CreationController extends Controller
{

    
    public function creationAction()
    {
            $security = $container->get('security.context');
            $token = $security->getToken();
            $user = $token->getUser();
            // Sels les users connectes ont droit d'acceder à la creation d'enquetes
        if ($user) {
        $enquete = new Enquete();
        $form = $this->createForm(new EnqueteType(),$enquete);
        $em = $this->getDoctrine()->getManager();
        
        $formHandler = new FormHandler($form,$this->get('request'),$em);
        
        if($formHandler->process()){
             return $this->redirect
                ($this->generateUrl('enquetes_main_repondre',
                        array('enqueteId'=>$enquete->getId() ) ) );
        }
        
        return $this->render('EnquetesMainBundle:Default:creation.html.twig',
                array('form'=>$form->createView()));
    }


else
{
    // Utilisateur non authentifie
    return $this->render('EnquetesMainBundle:Default:accueil.html.twig');
}
}
}
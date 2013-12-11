<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Theme;



class UtilisateurController extends Controller {
    

    public function utilisateurAction(){
        //verifie si connecté
     if ($this->get('security.context')->isGranted('ROLE_USER')) {
         //récupère l'identifiant de l'utilisateur
         $security = $this->get('security.context');
         $token = $security->getToken();
         $user = $token->getUser();
         $id_user = $user->getUserId();
         
         // appel au repository affichage enquete par utilisateur
        $em = $this->getDoctrine()->getManager();
        $enquete = $em->getRepository('EnquetesMainBundle:Enquete')
                ->getEnqueteByUser($id_user);
        
        return $this->render('EnquetesMainBundle:Default:utilisateur.html.twig',
                array('enquetes'=>$enquete));
    }
    else
    {
       return $this->redirect ($this->generateUrl('enquetes_main_accueil'));
    }
    }
    

    
    
}


<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Theme;



class UtilisateurController {
    
   /**
   * @Secure(roles="ROLE_USER")
   */
    public function utilisateur(Theme $id){
        $em = $this->getDoctrine()->getManager();
        $enquete = $em->getRepository('EnquetesMainBundle:Enquete')
                ->getEnqueteByUser($id);
        
        return $this->render('EnquetesMainBundle:default:utilisateur.html.twig',
                array('Enquetes'=>$enquete, 'theme'=>$id));
    }
    
    
    
    
}


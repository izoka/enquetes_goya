<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;



class SuppresionController extends Controller {
    
    public function suppressionAction(Enquete $id){
             if ($this->get('security.context')->isGranted('ROLE_USER')) {
        
               $enquete = $this->getDoctrine()->getManager()
                ->getRepository("EnquetesMainBundle:Enquete")
                ->find($id);    
               
         $security = $this->get('security.context');
         $token = $security->getToken();
         $user = $token->getUser();
         $id_user = $user->getUserId();
               
   
        if($id_user === $enquete->getUserUtilisateur()->getUserId())     
        { 
        $em = $this->getDoctrine()->getManager();      
        $enquete->SetIsactif(false);
        $em->persist($enquete);
       
        $em->flush();
        $this->get('session')->getFlashBag()
             ->add('success','l\'enquete a bien été supprimer');
        }
                 
        return $this->redirect ($this->generateUrl('enquetes_main_utilisateur'));
        
        
             }
    }
    
}
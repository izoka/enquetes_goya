<?php


/**
 * Description of byThemeController
 *
 * @author stagiaire
 */
class utilisateurController {
    
    public function viewByUserAction(Theme $id){
        $em = $this->getDoctrine()->getManager();
        $enquete = $em->getRepository('EnquetesMainBundle:Enquete')
                ->getEnqueteByUser($id);
        
        return $this->render('EnquetesMainBundle:default:utilisateur.html.twig',
                array('Enquetes'=>$enquete, 'theme'=>$id));
    }
    
}


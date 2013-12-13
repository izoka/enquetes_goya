<?php
namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ResultatController extends Controller
{
     public function resultatAction() {
         
         if ($this->get('security.context')->isGranted('ROLE_USER')) {
             
             
        $em = $this->getDoctrine()->getManager();
        $enquetes = $em->getRepository('EnquetesMainBundle:Enquete')
                ->getAllEnquete();
//        var_dump( $enquetes);
        return $this->render('EnquetesMainBundle:Default:resultat.html.twig',
                array('enquetes'=>$enquetes));
    }
         }      
          
         public function rechercherRepAction($id) {
                   if ($this->get('security.context')->isGranted('ROLE_USER')) {
                       
            $em = $this->getDoctrine()->getManager();

            $reponses = $em->getRepository('EnquetesMainBundle:Reponse')
                    ->findByquestionQuestion($id);
            return $this->render('EnquetesMainBundle:Default:reponse.html.twig',
                array('reponses'=>$reponses)); }
  }  
  
   public function menuAction() {
        
        return $this->render('EnquetesMainBundle:Default:menu.html.twig');
    }
}  
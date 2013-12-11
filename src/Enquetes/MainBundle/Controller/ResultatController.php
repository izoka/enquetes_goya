<?php
namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Form\FormHandler;

class ResultatController extends Controller
{
     public function resultatAction() {
         
         if ($this->get('security.context')->isGranted('ROLE_USER')) {
             
             {
        $em = $this->getDoctrine()->getManager();
        $enquetes = $em->getRepository('EnquetesMainBundle:Enquete')
                ->getAllEnquete();
//        var_dump( $enquetes);
        return $this->render('EnquetesMainBundle:Default:resultat.html.twig',
                array('enquetes'=>$enquetes));
    }
         }      
          
         }
}




   
       
        

    
<?php
namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResultatsController extends Controller
{
     public function resultatAction()
           
    {
        $form = $this->createForm(new ResultatType());
        $em = $this->getDoctrine()->getManager();
        
        $formHandler = new FormHandler($form,$this->get('request'),$em);
        
        if($formHandler->process()){
             return $this->redirect
                ($this->generateUrl('enquetes_main_resultat'));
        }
        
          return $this->render('EnqueteMainBundle:Default:resultat.html.twig',
                array('form'=>$form->createView()));
}
}
<?php
namespace Enquetes\MainBundle\Controller;

class ResultatsController extends Controller
{

    
    public function resultat()
            
            
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
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
}
<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Form\EnqueteType;
use Enquetes\MainBundle\Form\FormHandler;
use Enquetes\MainBundle\Entity\QuestionRepository;

class RepondreController extends Controller
{

    
    public function repondreAction($id)
    {
        $enquete = $this->getDoctrine()->getManager()
        ->getRepository("EnquetesMainBundle:Enquete")
        ->find($id);
        
        $question = $this->getDoctrine()->getManager()
                ->getRepository("EnquetesMainBundle:Question")
                ->getAllQuestion($id);
        
        $form = $this->createForm(new EnqueteType(), $enquete);
        $em = $this->getDoctrine()->getManager();
        $formHandler = new FormHandler($form,$this->get('request'),$em);

        
        if($formHandler->process()){
//             return $this->redirect
//                ($this->generateUrl('enquetes_main_creation_step2',
//                        array('id'=>$enquete->getEnqueteId() ) ) );
        }
        
        
        return $this->render('EnqueteMainBundle:Default:repondre.html.twig', array('enquete'=>$enquete, 'form'=>$form->createView()));
    }
}
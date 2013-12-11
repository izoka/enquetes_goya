<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Form\EnqueteType;
use Enquetes\MainBundle\Form\FormHandler;

class RepondreController extends Controller
{

    
    public function repondreAction($id)
    {

        $enquete = $this->getDoctrine()->getManager()
                ->getRepository("EnquetesMainBundle:Enquete")
                ->find($id);
        
        return $this->render('EnqueteMainBundle:Default:repondre.html.twig', array('enquete'=>$enquete));
    }
}
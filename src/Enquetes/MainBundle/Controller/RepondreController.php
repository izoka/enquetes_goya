<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Form\EnqueteType;
use Enquetes\MainBundle\Form\FormHandler;

class CreationController extends Controller
{

    
    public function repondreAction(Enquete $id)
    {

        $enquete = $this->getDoctrine()->getManager()
                ->getRepository("EnquetesMainBundle:Enquete")
                ->find($id);
        
        return $this->render('EnqueteMainBundle:Default:repondre.html.twig', array('enquete'=>$enquete));
    }
}
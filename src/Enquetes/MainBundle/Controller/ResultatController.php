<?php
namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Form\FormHandler;
use Enquetes\MainBundle\Entity\Reponse;

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
      
         public function rechercherRepAction()
{               
    $request = $this->container->get('request');

    if($request->isXmlHttpRequest())
    {
        $motcle = '';
        $motcle = $request->request->get('$Enq_id');

        $em = $this->container->get('doctrine')->getEntityManager();

//        if($motcle != '')
//        {
//               $qb = $em->createQueryBuilder();
//
//               $qb->select('a')
//                  ->from('MyAppFilmothequeBundle:Acteur', 'a')
//                  ->where("a.nom LIKE :motcle OR a.prenom LIKE :motcle")
//                  ->orderBy('a.nom', 'ASC')
//                  ->setParameter('motcle', '%'.$motcle.'%');
//
//               $query = $qb->getQuery();               
//               $acteurs = $query->getResult();
//        }
//        else {
            $reponses = $em->getRepository('EnquetesMainBundle:Reponse')->findAll();
//        }

        return $this->container->get('templating')->renderResponse('EnquetesMainBundle:Default:resultat.html.twig', array(
            'acteurs' => $acteurs
            ));
    }
    else {
        return $this->listerAction();
    }
}
         
         
         
}




   
       
        

    
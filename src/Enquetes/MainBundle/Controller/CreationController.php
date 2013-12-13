<?php

namespace Enquetes\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Entity\Question;
use Enquetes\MainBundle\Form\EnqueteType;
use Enquetes\MainBundle\Form\QuestionType;
use Enquetes\MainBundle\Form\FormHandler;

class CreationController extends Controller {

    public function creationAction() {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $user = $this->get('security.context')->getToken()->getUser();
//        $id_user = $user->getUserId();
//        var_dump($id_user);

            $enquete = new Enquete($user);

//        $enquete->setIsactif(true);
            $form = $this->createForm(new EnqueteType(), $enquete);

            $em = $this->getDoctrine()->getManager();

            $formHandler = new FormHandler($form, $this->get('request'), $em);


            if ($formHandler->process2()) {
//             return $this->redirect
//                ($this->generateUrl('enquetes_main_creation_step2',
//                        array('id'=>$enquete->getEnqueteId() ) ) );
            }

            return $this->render('EnquetesMainBundle:Default:creation.html.twig', array('form' => $form->createView()));
        } else {
            return $this->redirect($this->generateUrl('enquetes_main_accueil'));
        }
    }

    public function modifierAction(Enquete $enquete) {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $user = $this->get('security.context')->getToken()->getUser();
//        $id_user = $user->getUserId();
//        var_dump($id_user);
//        $enquete->setIsactif(true);
            $form = $this->createForm(new EnqueteType(), $enquete);

            $em = $this->getDoctrine()->getManager();

            $formHandler = new FormHandler($form, $this->get('request'), $em);


            $request = $this->get('request');
            if ($request->getMethod() == 'POST') {
                $form->bind($request);
                    if ($form->isValid()) {

                        $obj = $form->getData();

                        $enquete = $this->getDoctrine()->getManager()
                                ->getRepository("EnquetesMainBundle:Enquete")
                                ->find($obj->getEnqueteId());

                        $questionList = $obj->getQuestion();
                        foreach ($questionList as $questionRow) {
                            $question = new Question();
                            $question->setLibelle($questionRow->getLibelle());
                            $question->setEnqueteEnquete($enquete);
                            $question->setTypeTypeDeQuestion($questionRow->getTypeTypeDeQuestion());
                             
                            $em->persist($question);
                            $em->flush();
                            
                        }
                    }
                }

                return $this->render('EnquetesMainBundle:Default:creation.html.twig', array('form' => $form->createView()));
            } else {
                return $this->redirect($this->generateUrl('enquetes_main_accueil'));
            }
        }

//
//    public function etape2Action($id)
//    {
//        
////        $user = $this->get('security.context')->getToken()->getUser();
//        $enquete = $this->getDoctrine()->getManager()
//                                        ->getRepository("EnquetesMainBundle:Enquete")
//                                        ->find($id);
//        
//        $question = new Question($id);
//        $form = $this->createForm(new QuestionType(), $question);
//        $em = $this->getDoctrine()->getManager();
//        
//        $formHandler = new FormHandler($form,$this->get('request'),$em);
//        
//        if($formHandler->process()){
//             return $this->redirect
//                ($this->generateUrl('enquetes_main_creation_step3',
//                        array('id'=>$enquete->getEnqueteId()) ) );
//        }
//        
//        return $this->render('EnquetesMainBundle:Default:creation.html.twig',
//                array('form'=>$form->createView(), 'enquete'=>$enquete ));
//        
//    }
//    
//    public function ajoutAction(){
//        $request = $this->getRequest();
//        
//         if($request->isXmlHttpRequest()){
//             
//             echo "OK";
//             
////            $subscriber = new EventSubscriber($builder->getFormFactory());
////            $builder->addEventSubscriber($subscriber);
//
////            $builder->add('eventType', 'entity', array('class' => 'Bundle:EventType', 'property' => 'eventName', 'required' => true));
//        } 
//    }
    }
    
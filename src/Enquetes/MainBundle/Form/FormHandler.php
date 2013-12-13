<?php

namespace Enquetes\MainBundle\Form;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Entity\Question;
//use Lddt\MainBundle\Entity\Draw;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FormHandler {
    protected $form;
    protected $request;
    protected $em;
    
    public function __construct(Form $form, Request $request, EntityManager $em) {
        $this->form = $form;
        $this->request= $request;
        $this->em = $em;
    }
    
    public function process(){
        if($this->request->getMethod()=="POST") {
            $this->form->bind($this->request);
           if($this->form->isValid()) {
               
               
                $this->onSuccess($this->form->getData());
                return true;
            }
        }
    }
    
    public function onSuccess($obj) {
        $this->em->persist($obj);
        $this->em->flush();
    }
    
        public function process2(){
        if($this->request->getMethod()=="POST") {
            $this->form->bind($this->request);
           if($this->form->isValid()) {
               
                $this->onSuccess2($this->form->getData());
                return true;
            }
        }
    }
    
    public function onSuccess2($obj) {
        
        
        
        $enquete = new Enquete($obj->getUserUtilisateur());
        $enquete->setTitre($obj->getTitre());
        $enquete->setDescription($obj->getDescription());
        $enquete->setTitre($obj->getTitre());
        $enquete->setThemeTheme($obj->getThemeTheme());
        $this->em->persist($enquete);
        $this->em->flush();
        
        $questionList = $obj->getQuestion();
        foreach ($questionList as $questionRow){
            $question = new Question();
            $question->setLibelle($questionRow->getLibelle());
            $question->setEnqueteEnquete($enquete);
            $question->setTypeTypeDeQuestion($questionRow->getTypeTypeDeQuestion());
            $this->em->persist($question);
            $this->em->flush();
        }
    }
        
        public function process3(){
        if($this->request->getMethod()=="POST") {
            $this->form->bind($this->request);
           if($this->form->isValid()) {
               
               
                $this->onSuccess3($this->form->getData());
                return true;
            }
        }
    }
    
    public function onSuccess3($obj) {
        
        
         $enquete = $this->getDoctrine()->getManager()
        ->getRepository("EnquetesMainBundle:Enquete")
        ->find($obj->getEnqueteId());
        
        $questionList = $obj->getQuestion();
        foreach ($questionList as $questionRow){
            $question = new Question();
            $question->setLibelle($questionRow->getLibelle());
            $question->setEnqueteEnquete($enquete);
            $question->setTypeTypeDeQuestion($questionRow->getTypeTypeDeQuestion());
            $this->em->persist($question);
            $this->em->flush();
        }  
        
        
//        $this->em->persist($obj);
//        $this->em->flush();
    }
}

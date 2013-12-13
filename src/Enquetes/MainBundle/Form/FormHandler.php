<?php

namespace Enquetes\MainBundle\Form;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Enquetes\MainBundle\Entity\Enquete;
use Enquetes\MainBundle\Entity\Question;
//use Lddt\MainBundle\Entity\Draw;

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
               
               var_dump($this->form->getData());
               
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
        
        
//        $this->em->persist($obj);
//        $this->em->flush();
    }
}

<?php

namespace Enquetes\MainBundle\Form;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
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
                $this->onSuccess($this->form->getData());
                return true;
            }
        }
    }
    
    public function onSuccess($obj) {
        $this->em->persist($obj);
        $this->em->flush();
    }
}

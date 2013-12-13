<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;


/**
 * EnqueteRepository
 *
 * @author stagiaire
 */


class ReponseRepository extends EntityRepository
{
  
  
     public function findByquestionQuestion($id){
        $query = $this->getEntityManager()->createQuery(
                'SELECT r,q FROM EnquetesMainBundle:Reponse r Join r.questionQuestion q WHERE q.enqueteEnquete = :id')->setParameter('id', $id);
        
         
                return $query->getResult();
    }
    

    
}


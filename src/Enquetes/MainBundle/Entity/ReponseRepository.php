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
                'SELECT r,t FROM EnquetesMainBundle:Reponse r Join r.questionQuestion r WHERE r.enqueteEnquete = :id')->setParameter('id', $id);
        
         
                return $query->getResult();
    }
    

    
}


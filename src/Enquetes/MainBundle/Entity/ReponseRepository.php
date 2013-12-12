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
  
  
     public function findByd($id){
        $query = $this->getEntityManager()->createQuery(
                'SELECT e FROM EnquetesMainBundle:Reponse e ');
        return $query->getResult();
    }
    
}


<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;


/**
 * EnqueteRepository
 *
 * @author stagiaire
 */


class QuestionRepository extends EntityRepository
{
        public function getAllQuestion($id){
        $query = $this->getEntityManager()->createQuery(
                'SELECT q,t FROM EnquetesMainBundle:Question q Join q.typeTypeDeQuestion t WHERE q.enqueteEnquete = :id')->setParameter('id', $id);
        
        return $query->getResult();
    }
    
}
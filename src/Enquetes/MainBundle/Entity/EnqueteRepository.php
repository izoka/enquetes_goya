<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;


/**
 * EnqueteRepository
 *
 * @author stagiaire
 */


class EnqueteRepository extends EntityRepository
{
    public function getAllEnquete(){
        $query = $this->getEntityManager()->createQuery(
                'SELECT e,t,u FRM enquetesMainBundle:Enquetes e Join e.theme t JOIN e.utilisateur u ');
        
        return $query->getResult();
    }
    
    public function getEnqueteByUser($user){
        $query = $this->createQueryBuilder('e')
                ->where('e.utilisateur = :user')
                ->join('e.utilisateur', 'u')
                ->join('e.theme', 't')
                ->setParameter('user', $user)
                ->addSelect('u', 't')
                ;
        
        return $query->getQuery()->getResult();
    }
}

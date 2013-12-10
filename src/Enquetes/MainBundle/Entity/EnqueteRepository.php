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
                'SELECT * FRM EnqueteMainBundle:Enquete e ');
        
        return $query->getResult();
    }
    
    public function getEnqueteByTheme($theme){
        $query = $this->createQueryBuilder('e')
                ->where('e.theme = :theme')
                ->join('e.theme', 't')
                ->setParameter('theme', $theme)
                ->addSelect('t')
                ;
        
        return $query->getQuery()->getResult();
    }
    
    public function getEnqueteByUser($user){
        $query = $this->createQueryBuilder('e')
                ->where('e.utilisateur = :user')
                ->join('e.utilisateur', 'u')
                ->setParameter('user', $user)
                ->addSelect('u')
                ;
        
        return $query->getQuery()->getResult();
    }
}

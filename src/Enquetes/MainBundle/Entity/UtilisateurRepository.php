<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UtilisateurRepository
 *
 * @author stagiaire
 */
class UtilisateurRepository extends EntityRepository
{
    
       
    public function getUser($email){
        $query = $this->createQueryBuilder('u')
                ->where('u.email = :email')
                ->setParameter('email', $email)
                ->addSelect('t')
                ;
        
        return $query->getQuery()->getResult();
    }
    
}

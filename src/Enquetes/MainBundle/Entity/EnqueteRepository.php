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
                'SELECT e,t FROM EnquetesMainBundle:Enquete e Join e.themeTheme t');
        
        return $query->getResult();
    }
    
    public function getEnqueteByUser($user){
        
         $query = $this->getEntityManager()->createQuery(
                'SELECT e,t FROM EnquetesMainBundle:Enquete e Join e.themeTheme t WHERE e.userUtilisateur=:user AND e.isactif=true')->setParameter('user', $user);
        
        return $query->getResult();
    }
    
    public function getEnqueteByTheme($user, $theme){
        $query = $this->getEntityManager()->createQuery(
                'SELECT e,t FROM EnquetesMainBundle:Enquete e Join e.themeTheme t WHERE e.userUtilisateur=:user AND e.themeTheme=:theme AND e.isactif=true')->setParameter('user', $user)->setParameter('theme', $theme);
        
        return $query->getResult();
        
    }
    
    
}

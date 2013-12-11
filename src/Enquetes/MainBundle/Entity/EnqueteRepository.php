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
//        $query = $this->createQueryBuilder('e')
//                ->where('e.utilisateur = :user')
//                ->join('e.theme', 't')
//                ->setParameter('user', $user)
//                ->addSelect( '')
//                ;
//        
//        return $query->getQuery()->getResult();
        
        
         $query = $this->getEntityManager()->createQuery(
                'SELECT e,t FROM EnquetesMainBundle:Enquete e Join e.themeTheme t WHERE e.isactif=true');
        
        return $query->getResult();
    }
}

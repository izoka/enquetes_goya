<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDeQuestion
 *
 * @ORM\Table(name="type_de_question")
 * @ORM\Entity
 */
class TypeDeQuestion
{
    /**
     * @var integer
     * @ORM\Column(name="type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeId;

    /**
     * @var string
     * @ORM\Column(name="libelle", type="string", length=128, nullable=false)
     */
    private $libelle;
    


    /**
     * Get typeId
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return TypeDeQuestion
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Get libelle
     *
     * @return string 
     */
    public function getDisplayType()
    {
        return $this->libelle;
    }
}
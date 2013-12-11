<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enquete
 *
 * @ORM\Table(name="enquete")
 * @ORM\Entity(repositoryClass="Enquetes\MainBundle\Entity\EnqueteRepository")
 */
class Enquete
{
    /**
     * @var integer
     *
     * @ORM\Column(name="enquete_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enqueteId;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=512, nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActif", type="boolean", nullable=false)
     */
    private $isactif;

    /**
     * @var \Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="theme_id_theme", referencedColumnName="theme_id")
     * })
     */
    private $themeTheme;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_utilisateur", referencedColumnName="user_id")
     * })
     */
    private $userUtilisateur;

    
    function __construct($userUtilisateur) {
        $this->userUtilisateur = $userUtilisateur;
        $this->isactif = true;
    }


    /**
     * Get enqueteId
     *
     * @return integer 
     */
    public function getEnqueteId()
    {
        return $this->enqueteId;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Enquete
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Enquete
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isactif
     *
     * @param boolean $isactif
     * @return Enquete
     */
    public function setIsactif($isactif)
    {
        $this->isactif = $isactif;
    
        return $this;
    }

    /**
     * Get isactif
     *
     * @return boolean 
     */
    public function getIsactif()
    {
        return $this->isactif;
    }

    /**
     * Set themeTheme
     *
     * @param \Enquetes\MainBundle\Entity\Theme $themeTheme
     * @return Enquete
     */
    public function setThemeTheme(\Enquetes\MainBundle\Entity\Theme $themeTheme = null)
    {
        $this->themeTheme = $themeTheme;
    
        return $this;
    }

    /**
     * Get themeTheme
     *
     * @return \Enquetes\MainBundle\Entity\Theme 
     */
    public function getThemeTheme()
    {
        return $this->themeTheme;
    }

    /**
     * Set userUtilisateur
     *
     * @param \Enquetes\MainBundle\Entity\Utilisateur $userUtilisateur
     * @return Enquete
     */
    public function setUserUtilisateur(\Enquetes\MainBundle\Entity\Utilisateur $userUtilisateur = null)
    {
        $this->userUtilisateur = $userUtilisateur;
    
        return $this;
    }

    /**
     * Get userUtilisateur
     *
     * @return \Enquetes\MainBundle\Entity\Utilisateur 
     */
    public function getUserUtilisateur()
    {
        return $this->userUtilisateur;
    }
}
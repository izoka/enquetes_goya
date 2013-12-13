<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="Enquetes\MainBundle\Entity\QuestionRepository")
 */
class QuestionReponse
{
    /**
     * @var integer
     * @ORM\Column(name="question_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionId;

    /**
     * @var string
     * 
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var \TypeDeQuestion
     *
     * @ORM\ManyToOne(targetEntity="TypeDeQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id_type_de_question", referencedColumnName="type_id")
     * })
     */
    private $typeTypeDeQuestion;

    /**
     * @var \Enquete
     *
     * @ORM\ManyToOne(targetEntity="Enquete", inversedBy="question" )
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="enquete_id_enquete", referencedColumnName="enquete_id")
     * })
     */
    private $enqueteEnquete;


            
  
    
    function __construct() {
 
    }
    

    /**
     * Get questionId
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Question
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
     * Set typeTypeDeQuestion
     *
     * @param \Enquetes\MainBundle\Entity\TypeDeQuestion $typeTypeDeQuestion
     * @return Question
     */
    public function setTypeTypeDeQuestion(\Enquetes\MainBundle\Entity\TypeDeQuestion $typeTypeDeQuestion = null)
    {
        $this->typeTypeDeQuestion = $typeTypeDeQuestion;
    
        return $this;
    }

    /**
     * Get typeTypeDeQuestion
     *
     * @return \Enquetes\MainBundle\Entity\TypeDeQuestion 
     */
    public function getTypeTypeDeQuestion()
    {
        return $this->typeTypeDeQuestion;
    }

    /**
     * Set enqueteEnquete
     *
     * @param \Enquetes\MainBundle\Entity\Enquete $enqueteEnquete
     * @return Question
     */
    public function setEnqueteEnquete(\Enquetes\MainBundle\Entity\Enquete $enqueteEnquete = null)
    {
        $this->enqueteEnquete = $enqueteEnquete;
    
        return $this;
    }

    /**
     * Get enqueteEnquete
     *
     * @return \Enquetes\MainBundle\Entity\Enquete 
     */
    public function getEnqueteEnquete()
    {
        return $this->enqueteEnquete;
    }
    public function __toString() {
       return $this->libelle;
    }






}
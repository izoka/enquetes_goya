<?php

namespace Enquetes\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="Enquetes\MainBundle\Entity\ReponseRepository")
 * @ORM\Entity
 */
class Reponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reponse_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reponseId;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=512, nullable=false)
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=128, nullable=false)
     */
    private $uid;

    /**
     * @var \Question
     *
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponse" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id_question", referencedColumnName="question_id")
     * })
     */
    private $questionQuestion;

  


    /**
     * Get reponseId
     *
     * @return integer 
     */
    public function getReponseId()
    {
        return $this->reponseId;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     * @return Reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    
        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set uid
     *
     * @param string $uid
     * @return Reponse
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    
        return $this;
    }

    /**
     * Get uid
     *
     * @return string 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set questionQuestion
     *
     * @param \Enquetes\MainBundle\Entity\Question $questionQuestion
     * @return Reponse
     */
    public function setQuestionQuestion(\Enquetes\MainBundle\Entity\Question $questionQuestion = null)
    {
        $this->questionQuestion = $questionQuestion;
    
        return $this;
    }

    /**
     * Get questionQuestion
     *
     * @return \Enquetes\MainBundle\Entity\Question 
     */
    public function getQuestionQuestion()
    {
        return $this->questionQuestion;
    }
}
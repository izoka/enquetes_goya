<?php

namespace Enquetes\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('typeTypeDeQuestion','entity',
                                        array('label'=>"Type de question",
                                              'class'=>'Enquetes\MainBundle\Entity\TypeDeQuestion',
                                              'property'=>'displayType',
                                              'attr'=>array('class'=>'form-control')))
            ->add('enqueteEnquete')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Enquetes\MainBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'enquetes_mainbundle_question';
    }
}

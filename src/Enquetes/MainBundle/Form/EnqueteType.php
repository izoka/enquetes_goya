<?php

namespace Enquetes\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Enquetes\MainBundle\Form\QuestionType;

class EnqueteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('themeTheme')
            ->add('userUtilisateur')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Enquetes\MainBundle\Entity\Enquete'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'enquetes_mainbundle_enquete';
    }
}

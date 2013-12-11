<?php

namespace Enquetes\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            ->add('email')
//            ->add('password')
//        ;
        $builder
            ->add('username','text',
                    array('attr'=>array('class'=>'form-control',
                            'placeholder'=>'Entrer pseudo')))
            ->add('email','email',
                    array('attr'=>array('class'=>'form-control',
                            'placeholder'=>'Entrer email')))
             ->add('password','password',
                    array('attr'=>array('class'=>'form-control',
                            'placeholder'=>'Password')));
           
       
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Enquetes\MainBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'enquetes_mainbundle_utilisateur';
    }
}

<?php

namespace Enquetes\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Enquetes\MainBundle\Form\QuestionType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Security\Core\SecurityContext;

class EnqueteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
      ->add('titre', 'text',
                    array('label'=>"Libellé",
                          'attr'=>array('class'=>'form-control')))
      ->add('description','textarea',
                    array('label'=>"Description",
                          'attr'=>array('class'=>'form-control')))             
      ->add('themeTheme','entity',
                   array('label'=>"Thème",
                         'class'=>'Enquetes\MainBundle\Entity\Theme',
                         'property'=>'displayTheme',
                         'attr'=>array('class'=>'form-control')));
                
      $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
          $form = $event->getForm();
          
            $form->add('question', 'collection', array('type' => new QuestionType(),
                                              'allow_add'    => true,
                                              'allow_delete' => true));     
        });
                
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

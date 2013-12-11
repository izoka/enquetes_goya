<?php

namespace Acme\DemoBundle\Form\Type;

use Acme\DemoBundle\Form\EventListener\AddNameFieldSubscriber;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('price');

        $builder->addEventSubscriber(new AddNameFieldSubscriber());
    }
}
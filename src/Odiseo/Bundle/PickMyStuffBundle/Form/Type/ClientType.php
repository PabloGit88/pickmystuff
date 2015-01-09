<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', 'text', array(
        		'required' => true,
        		'label'    => 'Email'
        ))
        ->add('fullName', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre y Apellido'
        ))
        ->add('desiredDeliveryDate', 'date', array(
			    'input'  => 'datetime',
			    'widget' => 'choice',
        		'required' => false,
        		'label'    => 'Fecha deseada de entrega'
        ))
        ->add('sendText', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Acepta SMS?'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_client';
    }
}

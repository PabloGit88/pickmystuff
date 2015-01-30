<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('status', 'choice', array('choices' => array(
				'Abierto' => 'Abierto',
				'Enviado' => 'Enviado', 
				'Recibido' => 'Recibido',
				'Cerrado' => 'Cerrado',
			),
	        'required' => true,
	        'label'    => 'Estado'
        ))
        ->add('collectedTime', 'text', array(
        		'required' => false,
        		'label'    => 'Horario deseado de recogido'
        ))
        ->add('deliveryTime', 'text', array(
        		'required' => false,
        		'label'    => 'Horario deseado de entrega'
        ))
        ->add('isComplete', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Completado?'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_order';
    }
}

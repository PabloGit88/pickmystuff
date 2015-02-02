<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarrierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('vehicleType', 'choice', array('choices' => array(
				'Pickup' => 'Pickup',
				'Minivan' => 'Minivan', 
				'Van' => 'Van', 
				'Canib 15' => 'Canib 15',
				'Canib 20' => 'Canib 20',
				'Canib 24' => 'Canib 24',
				'Refrigerado' => 'Refrigerado',
				'Plataforma' => 'Plataforma',
				'Grua' => 'Grua',
				),
        		'required' => true,
        		'label'    => 'Tipo de Vehiculo'
        ))
        ->add('name', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre y Apellido'
        ))
        ->add('phone', 'text', array(
        		'required' => true,
        		'label'    => 'Teléfono'
        ))
        ->add('originTown', 'text', array(
        		'required' => true,
        		'label'    => 'Pueblo de Origen'
        ))
        ->add('destinationTown', 'text', array(
        		'required' => true,
        		'label'    => 'Pueblo de Destino'
        ))
        ->add('isPaid', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Pagado?'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_carrier';
    }
}

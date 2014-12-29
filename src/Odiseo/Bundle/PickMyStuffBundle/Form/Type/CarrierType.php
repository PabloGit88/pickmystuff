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
        ->add('vehicleType', 'text', array(
        		'required' => true,
        		'label'    => 'Tipo de Vehiculo'
        ))
        ->add('name', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre'
        ))
        ->add('phone', 'text', array(
        		'required' => true,
        		'label'    => 'Teléfono'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_carrier';
    }
}

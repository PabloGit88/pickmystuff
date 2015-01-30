<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', 'text', array(
        		'required' => false,
        		'label'    => 'Email'
        ))
        ->add('contactName', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre de contacto'
        ))
        ->add('locality', 'text', array(
        		'required' => true,
        		'label'    => 'Localidad'
        ))
        ->add('province', 'text', array(
        		'required' => true,
        		'label'    => 'Pueblo'
        ))
        ->add('zipcode', 'text', array(
        		'required' => true,
        		'label'    => 'Codigo Postal'
        ))
        ->add('street', 'text', array(
        		'required' => true,
        		'label'    => 'Direccion fisica'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_address';
    }
}

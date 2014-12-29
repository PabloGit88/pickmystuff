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
        ->add('status', 'text', array(
        		'required' => true,
        		'label'    => 'Status'
        ))
        ->add('sourceAddress', 'entity', array(
    			'class' => 'OdiseoPickMyStuffBundle:Address',
        		'required' => false,
        		'label'    => 'Direccion de origen'
        ))
        ->add('destinationAddress', 'entity', array(
    			'class' => 'OdiseoPickMyStuffBundle:Address',
        		'required' => false,
        		'label'    => 'Direccion de destino'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_order';
    }
}

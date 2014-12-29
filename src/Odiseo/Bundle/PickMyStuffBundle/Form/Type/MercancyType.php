<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MercancyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('type', 'text', array(
        		'required' => true,
        		'label'    => 'Tipo'
        ))
        ->add('length', 'text', array(
        		'required' => true,
        		'label'    => 'Largo'
        ))
        ->add('width', 'text', array(
        		'required' => true,
        		'label'    => 'Ancho'
        ))
        ->add('height', 'text', array(
        		'required' => true,
        		'label'    => 'Alto'
        ))
        ->add('weight', 'text', array(
        		'required' => true,
        		'label'    => 'Peso'
        ))
        ->add('quantity', 'text', array(
        		'required' => true,
        		'label'    => 'Cantidad'
        ))
        ->add('order', 'entity', array(
    			'class' => 'OdiseoPickMyStuffBundle:Order',
        		'required' => true,
        		'label'    => 'Pedido'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_mercancy';
    }
}

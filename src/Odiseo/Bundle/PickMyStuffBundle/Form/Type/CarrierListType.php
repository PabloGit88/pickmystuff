<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarrierListType extends CarrierType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $builder
        ->add('email', 'email', array(
        		'required' => false,
        		'label'    => 'Email'
        ))
        ->add('address', 'text', array(
        		'required' => false,
        		'label'    => 'Dirección'
        ))
        ->add('photoTruck', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Fotografia Camion'
        ))
        ->add('commissionPermits', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Permisos Comision'
        ))
        ->add('portsPermits', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Permisos Puertos'
        ))
        ->add('carPolicy', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Poliza de auto'
        ))
        ->add('mercancyPolicy', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Poliza de Mercancia'
        ))
        ->add('responsabilityPolicy', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Poliza de Resp. publica'
        ))
        ->add('contractPickmystuff', 'checkbox', array(
        		'required' => false,
        		'label'    => 'Contrato PickMyStuff'
        ))
        ;
    }
    
    public function getName()
    {
        return 'odiseo_pickmystuff_list_carrier';
    }
}

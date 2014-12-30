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
        ->add('type', 'choice', array('choices' => array(
				'Sobre' => 'Sobre',
				'Caja pequeña' => 'Caja pequeña', 
				'Paleta' => 'Paleta',
				'Pieza suelta' => 'Pieza suelta',
				'Vagon' => 'Vagon',
				),
        		'required' => true,
        		'label'    => 'Tipo'
        ))
        ->add('length', 'text', array(
        		'required' => false,
        		'label'    => 'Largo'
        ))
        ->add('width', 'text', array(
        		'required' => false,
        		'label'    => 'Ancho'
        ))
        ->add('height', 'text', array(
        		'required' => false,
        		'label'    => 'Alto'
        ))
        ->add('weight', 'text', array(
        		'required' => false,
        		'label'    => 'Peso'
        ))
        ->add('quantity', 'text', array(
        		'required' => true,
        		'label'    => 'Cantidad'
        ))
        ;
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_mercancy';
    }
}

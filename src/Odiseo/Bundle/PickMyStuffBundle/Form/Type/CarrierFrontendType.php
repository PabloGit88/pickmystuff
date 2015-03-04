<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Order;


class CarrierFrontendType extends AbstractType

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
  				'empty_data'  => null,
        		'required' => true,
        		'label'    => 'Escoger vehiculo'
        ))
		;
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Odiseo\Bundle\PickMyStuffBundle\Entity\Carrier',
      			'cascade_validation' => true,
		));
	}
	public function getName()
	{
		return 'carrier_type';
	}
}
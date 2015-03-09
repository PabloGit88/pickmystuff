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
				'Autos' => 'Autos',
				'PickUps' => 'PickUps', 
				'Minivans secas' => 'Minivans secas', 
				'Minivans refrigeradas' => 'Minivans refrigeradas',
				'Vans' => 'Vans',
				'StepVans' => 'StepVans',
				'Camiones cerrados' => 'Camiones cerrados',
				'Remolques' => 'Remolques',
				'Grua' => 'Grua',
				'Vagones' => 'Vagones',
				'Tanques de agua' => 'Tanques de agua'
				),
  				'empty_data'  => null,
        		'empty_value' => '     ',
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
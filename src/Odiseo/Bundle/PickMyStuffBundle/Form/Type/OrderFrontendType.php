<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class OrderFrontendType extends AbstractType

{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder
       /*     ->add('sourceAddress', 'entity', array(
        		'class'    => 'OdiseoPickMyStuffBundle:Address',
        		'required' => true,
        		'label'    => 'Recogido'
        ))
            ->add('destinationAddress', 'entity', array(
        		'class'    => 'OdiseoPickMyStuffBundle:Address',
        		'required' => true,
        		'label'    => 'Entrega'
        ))*/
       		->add('client', new ClientFrontendType())
       		->add('sourceAddress', new AddressFrontendType(), array(
        		'label'    => 'Recogido: '
       		))
       		->add('destinationAddress', new AddressFrontendType(), array(
        		'label'    => 'Entrega: '
       		))
       		->add('mercancy', new MercancyFrontendType(), array(
        		'label'    => false
       		))
            ->add('comments', 'textarea', array(
        		'required' => false,
        		'label'    => 'Comentarios de entrega:'
      		))
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
	        		'label'    => 'Escoger Vehiculo'
	        ))
   			->add('Add', 'submit', array(
        		'label'    => 'Orden Adicional'
      		))
       		->add('Finalizar', 'submit')
		;
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Odiseo\Bundle\PickMyStuffBundle\Entity\Order',
      			'cascade_validation' => true,
		));
	}
	public function getName()
	{
		return 'order_type';
	}
}
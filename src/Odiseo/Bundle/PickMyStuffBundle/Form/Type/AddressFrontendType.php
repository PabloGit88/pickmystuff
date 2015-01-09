<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AddressFrontendType extends AbstractType

{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder
            ->add('contactName', 'text', array(
        		'required' => true,
            	'label' => false,
		        'attr' => array(
		             'placeholder' => 'Nombre y Apellido',
		        )
        ))
            ->add('street', 'text', array(
        		'required' => true,
            	'label' => false,
		        'attr' => array(
		             'placeholder' => 'Direccion'
		        )
        ))
		;
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Odiseo\Bundle\PickMyStuffBundle\Entity\Address',
      			'cascade_validation' => true,
		));
	}
	public function getName()
	{
		return 'address_type';
	}
}
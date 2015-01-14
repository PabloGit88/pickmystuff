<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Order;


class ClientFrontendType extends AbstractType

{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder
            ->add('fullName', 'text', array(
        		'required' => false,
        		'label'    => 'Contacto:',
		        'attr' => array(
		             'placeholder' => 'Nombre y Apellido',
		        ),
        ))
            ->add('phone', 'text', array(
        		'required' => false,
        		'label'    => 'TELEFONO'
        ))
            ->add('email', 'text', array(
        		'required' => false,
        		'label'    => 'EMAIL'
        ))
		;
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Odiseo\Bundle\PickMyStuffBundle\Entity\Client',
      			'cascade_validation' => true,
		));
	}
	public function getName()
	{
		return 'client_type';
	}
}
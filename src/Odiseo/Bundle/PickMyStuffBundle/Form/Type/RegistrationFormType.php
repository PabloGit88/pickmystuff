<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		//parent::buildForm($builder, $options);
		// add your custom field$country
		
		$builder->add('fullName', 'text', array( 'label' => 'Nombre', 'required' => true));
		//email
		
		$builder->add('username', 'email', array( 'label' => 'Email', 'required' => true));
		
		$builder->add('plainPassword', 'password', array( 'label' => 'Crear Contraseña', 'required' => true));
		
	}

	public function getName()
	{
		return 'pickmystuff_user_registration';
	}
}
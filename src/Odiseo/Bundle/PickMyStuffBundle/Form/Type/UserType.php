<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre Usuario'
        ))
        ->add('email', 'text', array(
        		'required' => true,
        		'label'    => 'Email'
        ))
        ->add('plainPassword', 'text', array(
        		'required' => true,
        		'label'    => 'Password'
        ))
        ->add('fullName', 'text', array(
        		'required' => true,
        		'label'    => 'Nombre y Apellido'
        ));
    }

    public function getName()
    {
        return 'odiseo_pickmystuff_user';
    }
}

<?php
namespace Odiseo\Bundle\PickMyStuffBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MercancyFrontendType extends AbstractType

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
  				'empty_data'  => null,
    			'placeholder' => 'Tipo de Mercancia',
        		'required' => true,
        		'label'    => false
        ))
        ->add('length', 'text', array(
        		'required' => false,
        		'label'    => false,
		        'attr' => array(
		             'placeholder' => 'Largo(cm)',
		        ),
        ))
        ->add('width', 'text', array(
        		'required' => false,
        		'label'    => false,
		        'attr' => array(
		             'placeholder' => 'Ancho(cm)',
		        ),
        ))
        ->add('height', 'text', array(
        		'required' => false,
        		'label'    => false,
		        'attr' => array(
		             'placeholder' => 'Alto(cm)',
		        ),
        ))
        ->add('weight', 'text', array(
        		'required' => false,
        		'label'    => false,
		        'attr' => array(
		             'placeholder' => 'Peso(libras)',
		        ),
        ))
        ->add('imageFile', 'file', array(
        		'required' => true,
        		'label'    => 'Subir imagen de mercancia'
        ));
		;
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Odiseo\Bundle\PickMyStuffBundle\Entity\Mercancy',
      			'cascade_validation' => true,
		));
	}
	public function getName()
	{
		return 'mercancy_type';
	}
}
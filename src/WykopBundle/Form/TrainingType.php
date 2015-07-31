<?php

namespace WykopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tag', 'entity', array(
		'label' => false,
		'placeholder' => 'Wybierz tag',
		'class' => 'WykopBundle:Tag',
		'attr' => array(
		    'oninvalid' => 'InvalidMsg(this);'
		)
		))
            ->add('City', 'entity', array(
		'required' => false, 
		'label' => false, 
		'placeholder' => 'Wybierz miasto',
		'class' => 'WykopBundle:City'
		))
            ->add('nameUser', 'hidden', array(
		'label' => 'Login'
		))
            ->add('distance', 'collection', array(
		'type' => 'text',
		'allow_add' => true,
		'prototype' => true,
		'required' => true,
		'label' => false
		))
	    ->add('date', 'collection', array(
		'type' => 'datetime',
		'allow_add' => true,
		'prototype' => true,
		'mapped' => false,
		'label' => false
	    ))
	    ->add('details', 'textarea', array(
		'required' => false,
		'label' => false,
		'attr' => array(
		    'placeholder' => 'Miejsce na opis'
		    )
		));
    }
    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WykopBundle\Entity\Training'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wykopbundle_training';
    }
}

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
            ->add('idTag', 'entity', array(
		'label' => false,
		'placeholder' => 'Wybierz tag',
		'class' => 'WykopBundle:Tag',
		'attr' => array(
		    'oninvalid' => 'InvalidMsg(this);'
		)
		))
            ->add('idCity', 'entity', array(
		'required' => false, 
		'label' => false, 
		'placeholder' => 'Wybierz miasto',
		'class' => 'WykopBundle:City'
		))
            ->add('nameUser', 'hidden', array(
		'label' => 'Login'
		))
            ->add('link', 'hidden', array(
		'required' => false, 
		'label' => false, 
		'attr' => array(
		    'placeholder' => 'Endomondo/Strava/RunKeeper'
		    )
		))
            ->add('distance', 'text', array(
		'required' => true,
		'label' => false,
		'attr' => array(
		    'title' => 'Podaj dystans lub link do treningu Endomondo/Strava/RunKeeper',
		    'oninvalid' => 'InvalidMsg(this);',
		    'placeholder' => 'Podaj dystans lub link do treningu Endomondo/Strava/RunKeeper'
		    )
		))
	    ->add('description', 'textarea', array(
		'required' => false,
		'label' => false,
		'mapped' => false,
		'attr' => array(
		    'placeholder' => 'Miejsce na opis'
		    )
		))
	    ->add('date', 'datetime', array(
		'label' => false
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

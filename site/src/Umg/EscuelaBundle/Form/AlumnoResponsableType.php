<?php

namespace Umg\EscuelaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnoResponsableType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Alumno_id')
            ->add('Responsable_id')
            ->add('alumno')
            ->add('responsable')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Umg\EscuelaBundle\Entity\AlumnoResponsable'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umg_escuelabundle_alumnoresponsable';
    }
}

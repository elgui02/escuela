<?php

namespace Umg\EscuelaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsumoPersonalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Cantidad')
            ->add('Retornado')
            ->add('Insumo_id')
            ->add('Personal_id')
            ->add('insumo')
            ->add('personal')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Umg\EscuelaBundle\Entity\InsumoPersonal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umg_escuelabundle_insumopersonal';
    }
}

<?php

namespace Umg\EscuelaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InsumoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Codigo')
            ->add('Nombre')
            ->add('Cantidad')
            ->add('CantidadDisponible','number',array(
                'read_only'=>true,
            ))
            ->add('Retornable')
            ->add('fuente')
            ->add('categorium','entity',array(
                'label' => 'Categoria',
                'class' => 'UmgEscuelaBundle:Categorium',
                'empty_data' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Umg\EscuelaBundle\Entity\Insumo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umg_escuelabundle_insumo';
    }
}

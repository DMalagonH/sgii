<?php

namespace sgii\sgiiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TblProyectoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proNombre')
            ->add('proDescripcion')
            ->add('proProblema')
            ->add('proFechaCreacion')
            ->add('proConclusiones')
            ->add('proDemostraciones')
            ->add('proRecomendaciones')
            ->add('proEstado')
            ->add('estadoProyectoId')
            ->add('tipoInvestigacionId')
            ->add('lineaInvestigacionId')
            ->add('usuarioId')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sgii\sgiiBundle\Entity\TblProyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sgii_sgiibundle_tblproyecto';
    }
}

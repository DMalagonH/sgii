<?php

namespace sgii\sgiiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TblOrganizacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orgNombre')
            ->add('orgDescripcion')
            ->add('orgSitioWeb')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'sgii\sgiiBundle\Entity\TblOrganizacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sgii_sgiibundle_tblorganizacion';
    }
}

<?php

namespace FS\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * Constructor.
     *
     * @param string $dataClass
     */
    public function __construct($dataClass)
    {
        $this->dataClass = $dataClass;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array('required' => false, 'render_optional_text' => false))
            ->add('lastName', null, array('required' => false, 'render_optional_text' => false))
            ->add('email', 'email', array('required' => false, 'render_optional_text' => false))
            ->add('birthday', 'date', array(
                'format' => 'yyyy MMM dd',
                'required' => false,
                'render_optional_text' => false
            ))
            ->add('shoeSize')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => $this->dataClass,
                'csrf_protection' => false,
                'validation_groups' => array('Default', 'registration'),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ft_core_user';
    }
}
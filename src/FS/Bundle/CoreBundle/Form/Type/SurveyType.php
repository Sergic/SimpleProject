<?php

namespace FS\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyType extends AbstractType
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
            ->add('iceCream', null, array('required' => false, 'render_optional_text' => false))
            ->add('superHero', null, array('required' => false, 'render_optional_text' => false))
            ->add('movieStar', null, array('required' => false, 'render_optional_text' => false))
            ->add('worldEnd', null, array('required' => false, 'render_optional_text' => false))
            ->add('superBowl', null, array('required' => false, 'render_optional_text' => false))
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
                'validation_groups' => array('survey'),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ft_core_survey';
    }
}
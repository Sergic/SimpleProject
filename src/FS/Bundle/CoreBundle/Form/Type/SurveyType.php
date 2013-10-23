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
            ->add('iceCream', null, array('required' => false, 'render_optional_text' => false,
                'label' => 'What is Your Favorite Ice cream?'
            ))
            ->add('superHero', null, array('required' => false, 'render_optional_text' => false,
                'label' => 'Who is your favorite superhero?'
            ))
            ->add('movieStar', null, array('required' => false, 'render_optional_text' => false,
                'label' => 'Who is your favorite movie star?'
            ))
            ->add('worldEnd', 'date', array('required' => false, 'render_optional_text' => false,
                'format' => 'yyyy MMM dd',
                'years' => range(date('Y') - 100, date('Y') - 5),
                'label' => 'When do you think the world will end?'
            ))
            ->add('superBowl', null, array('required' => false, 'render_optional_text' => false,
                'label' => 'Who will win the super bowl this year?'
            ))
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
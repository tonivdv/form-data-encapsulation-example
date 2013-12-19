<?php

namespace Form\Type;

use Model\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
          array(
            'data_class' => 'Model\Email',
            'empty_data' => function (FormInterface $form) {
                  return new Email(
                    $form->get('email')
                      ->getData()
                  );
              }
          )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return "email";
    }
}
<?php

namespace Form\Type;

use Model\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('name', 'text')
          ->add('email', new EmailType());
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
          array(
            'data_class' => 'Model\Customer',
            'empty_data' => function (FormInterface $form) {
                  return new Customer(
                    $form->get('name')
                      ->getData(),
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
        return "customer";
    }
}
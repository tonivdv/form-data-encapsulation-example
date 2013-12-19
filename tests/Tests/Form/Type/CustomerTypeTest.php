<?php

namespace Tests\Form\Type;

use Form\Type\CustomerType;
use Form\Type\EmailType;
use Model\Customer;
use Model\Email;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Test\TypeTestCase;

class CustomerTypeTest extends TypeTestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->factory = Forms::createFormFactoryBuilder()
          ->getFormFactory();
    }

    public function test_customer_type()
    {
        $formData = array(
          'name'  => 'A customer',
          'email' => array('email' => 'my@email.com')
        );

        $customer = new Customer($formData['name'], new Email($formData['email']));

        $type = new CustomerType();
        $form = $this->factory->create($type);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($customer, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
} 
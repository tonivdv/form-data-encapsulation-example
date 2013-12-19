<?php

namespace Tests\Form\Type;

use Form\Type\EmailType;
use Model\Email;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Test\TypeTestCase;

class EmailTypeTest extends TypeTestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->factory = Forms::createFormFactoryBuilder()
          ->getFormFactory();
    }

    public function test_email_type()
    {
        $formData = array(
          'email' => 'my@email.com',
        );

        $email = new Email($formData['email']);

        $type = new EmailType();
        $form = $this->factory->create($type);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($email, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
} 
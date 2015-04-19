<?php

namespace Clapit\Form;

use Silex\Application;

use Symfony\Component\Form\Forms;
use Symfony\Component\Validator\Constraints as Assert;

class LoginUser
{

    /**
     * @param Application $app The silex application
     */
    public function __construct(Application $app)
    {

        return $app['form.factory']->createBuilder('form')
            ->add('email', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Email() )
            ))
            ->add('password', 'text', array(
                'constraints' => array(new Assert\NotBlank() )
            ))
            ->getForm();
    }

}


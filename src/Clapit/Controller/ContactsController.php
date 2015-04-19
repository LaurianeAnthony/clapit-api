<?php

namespace Clapit\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Form\Forms;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator;

class ContactsController
{

    protected $emailsService;

    public function __construct($service)
    {
        $this->emailsService = $service;
    }

    public function sendContact(Application $app, Request $request)
    {

        $formContact = $app['form.factory']->createNamedBuilder(null, 'form', null, array('csrf_protection' => false))
            ->add('email', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => "Vous devez entrer une adresse email."
                    )),
                    new Assert\Email(array(
                        'checkMX' => true,
                        'message' => "Adresse email invalide."
                    ))
                )
            ))
            ->add('name', 'text', array(
                'constraints' => array(new Assert\NotBlank(array(
                        'message' => "Vous devez entrer votre nom/prénom."
                    )), new Assert\Type('string') )
            ))
            ->add('message', 'text', array(
                'constraints' => array(new Assert\NotBlank(array(
                        'message' => "Vous devez entrer un message."
                    )), new Assert\Type('string') )
            ))
            ->getForm();


        $formContact->handleRequest($request);

        if ($formContact->isValid()) {
            $result = $this->emailsService->sendContact($formContact->getData());

            if($result){
                return new JsonResponse(array("status" => "Message envoyé"), 200);
            } else {
                return new JsonResponse(array('status' => 'Message non envoyé'), 500);
            }
        }

        $errors = $app['midipile.helpers']->formErrorSerializer($formContact);
        return new JsonResponse(array('errors' => $errors), 400);
    }

}
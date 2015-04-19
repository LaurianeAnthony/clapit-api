<?php

namespace Clapit\Controller;

use Clapit\Form\LoginUser;
use Clapit\Service\UsersService;
use Clapit\Service\EmailsService;
use Clapit\Validator\Constraints\UserExist;
use Clapit\Validator\Constraints\UserNotExist;
use Clapit\Validator\Constraints\UserActive;
use Clapit\Validator\Constraints\PostalCode;
use Clapit\Entity\Users;

use Silex\Application;
use Silex\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Form\Forms;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator;

use JMS\Serializer\SerializationContext;

class UsersController
{

    protected $usersService;
	protected $emailsService;

	public function __construct(UsersService $usersService, ChancesService $chancesService, EmailsService $emailsService)
	{
        $this->usersService = $usersService;
		$this->emailsService = $emailsService;
	}

    public function logUser(Application $app, Request $request)
    {
        $formLogin = $app['form.factory']->createNamedBuilder(null, 'form', null, array('csrf_protection' => false))
            ->add('email', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Email(array('checkMX' => true)),
                    new UserExist(),
                    new UserActive()
                )
            ))
            ->add('password', 'text', array(
                'constraints' => new Assert\NotBlank()
            ))
            ->add('id_device', 'text', array(
            ))
            ->getForm();

        $formLogin->handleRequest($request);

        if ($formLogin->isValid()) {

            // try to log the user
            $formData = $formLogin->getData();
            $email = $formData['email'];
            $password = strtolower($formData['password']);

            $user = $this->usersService->getUserByEmail($email);

            // Check if credentials match
            $hashPwd = sha1( $this->usersService->unHashPwd($user['password']) );

            if($hashPwd == $password) {

                $idDevice = (empty($formData['id_device'])) ? null : $formData['id_device'];
                $user = $this->usersService->setIdDevice($user, $formData['id_device']);

                $user = $this->usersService->getUserById($user['id']);

                list($response, $headers) = $this->usersService->logUser($user);
                return new JsonResponse($response, 200, $headers);
            }

            return new JsonResponse(array("errors" => "Mot de passe invalide."), 400);
        }

        $errors = $app['clapit.helpers']->formErrorSerializer($formLogin);

        return new JsonResponse(array("errors" => $errors), 400);
    }

    public function registerUser(Application $app, Request $request)
    {
        $formRegister = $app['form.factory']->createNamedBuilder(null, 'form', null, array('csrf_protection' => false))
            ->add('firstname', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Type('string') )
            ))
            ->add('lastname', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Type('string') )
            ))
            ->add('email', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Email(array(
                    'message' => "Adresse email invalide.",
                    'checkMX' => true
                )), new UserNotExist()  )
            ))
            ->add('password', 'text', array(
                'constraints' => new Assert\NotBlank(array(
                    'message' => "Vous devez entrer un mot de passe."
                ))
            ))
            ->add('cgv', 'text', array(
                'constraints' => array(
                    new Assert\NotNull(array(
                        'message' => "Vous devez accepter les conditions générales d'utilisation pour vous inscrire."
                    )),
                    new Assert\True(array(
                        'message' => "Vous devez accepter les conditions générales d'utilisation pour vous inscrire."
                    ))
                )
            ))
            ->add('newsletter', 'text', array(
            ))
            ->add('parrain', 'text', array(
            ))
            ->add('referer', 'text', array(
            ))
            ->add('id_device', 'text', array(
            ))
            ->getForm();

        $formRegister->handleRequest($request);

        if ($formRegister->isValid()) {

            $newUser = new Users();

            // Register user
            $idUser = $this->usersService->registerUser($formRegister->getData(), $newUser, $request->getClientIp());

            $app['orm.em']->persist($newUser);
            $app['orm.em']->flush();

            $this->emailsService->sendWelcomeEmail($newUser->getEmail(), $newUser->getPrenom());
            
            // Log user and return header
            $headers = $this->usersService->generateHeader($newUser);

            return new Response(
                $app['serializer']->serialize(
                    $newUser, 
                    'json', 
                    SerializationContext::create()->setGroups(array('public'))
                    ), 
                200, 
                array('Content-Type' => 'application/json') . $headers
            );

            return new JsonResponse($response, 201, $headers);
        }

        $errors = $app['clapit.helpers']->formErrorSerializer($formRegister);
        // $errors = '';
        return new JsonResponse(array("errors" => $errors), 400);
    }

    public function editUser(Application $app, Request $request)
    {
        $formEdit = $app['form.factory']->createNamedBuilder(null, 'form', null, array(
            'csrf_protection' => false,
            'method' => 'PUT'
            ))
            ->add('firstname', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Type('string') )
            ))
            ->add('lastname', 'text', array(
                'constraints' => array(new Assert\NotBlank(), new Assert\Type('string') )
            ))
            ->add('email', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Email(array(
                        'message' => "Adresse email invalide."
                    )),
                    new UserNotExist()
                )
            ))
            ->add('newsletter', 'text', array(
            ))
            ->add('mobile', 'text', array(
            ))
            ->add('rue', 'text', array(
            ))
            ->add('rue_bis', 'text', array(
            ))
            ->add('code_postal', 'integer', array(
                'constraints' => array( new PostalCode() )
            ))
            ->add('ville', 'text', array(
            ))
            ->add('pays', 'text', array(
            ))
            ->add('password', 'text', array(
            ))
            ->getForm();

        $formEdit->handleRequest($request);
        if ($formEdit->isValid()) {

            $userId = $app['session']->get('user');

            $formData = $formEdit->getData();

            // update user
            $this->usersService->updateUser($userId['id'], $formData);

            // update password if needed
            if( !empty($formData['password'])){
                $this->usersService->updateUserPassword($userId['id'], $formData['password']);
            }

            // Get logged user data
            list($user, $headers)  = $this->usersService->getLoggedUser($app);

            list($response, $headers) = $this->usersService->logUser($user);
            return new JsonResponse($response, 200, $headers);
        }

        $errors = $app['clapit.helpers']->formErrorSerializer($formEdit);

        return new JsonResponse(array("errors" => $errors), 400);
    }

    public function forgetPassword(Application $app, Request $request)
    {
        $formEdit = $app['form.factory']->createNamedBuilder(null, 'form', null, array('csrf_protection' => false))
            ->add('email', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => "Vous devez envoyer une adresse email."
                    )),
                    new Assert\Email(array(
                        'message' => "Adresse email invalide."
                    )),
                    new UserExist()
                )
            ))
            ->getForm();

        $formEdit->handleRequest($request);

        // if form valid and user exist : send email
        if ($formEdit->isValid()) {

            $formData = $formEdit->getData();

            $user = $this->usersService->getUserByEmail($formData['email']);
            $pwd = $this->usersService->unHashPwd($user['password']);

            if($this->emailsService->sendForgetPassword($user['email'], $user['prenom'], $pwd)){
                $result = array("success" => "Mot de passe envoyé");
            } else {
                $result = array("errors" => "Echec des l'envoie du mot de passe");
            }

            return new JsonResponse($result, 200);
        }

        $errors = $app['clapit.helpers']->formErrorSerializer($formEdit);

        return new JsonResponse(array("errors" => $errors), 400);
    }

    public function getUser(Application $app, Request $request)
    {
        $user = $app['session']->get('user');

        list($response, $headers) = $this->usersService->getLoggedUser($app);

        return new JsonResponse($response, 200, $headers);
    }

}
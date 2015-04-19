<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\DBAL\Connection;


class EmailsService extends BaseService
{

    /**
    * @var string
    */
    private static $rootsEmail = 'emails/';

    private static $passwordForgetPath = 'password-forget.html.twig';
    private static $passwordForgetTitle = 'Rappel de votre mot de passe midipile.com';

    private static $contactTitle = '[MIDIPILE] Contact midipile.com';


    private static $welcomePath = 'welcome.html.twig';
    private static $welcomeTitle = 'Bienvenue sur Clapit.com !';

    /**
    * @var Twig_Environment
    */
    private $twig;

    /**
    * @var mailer
    */
    private $mailer;

    /**
    * @var array
    */
    private $configEmail;

    /**
    * @var string
    */
    private $rootPath;


    public function __construct(Connection $db, $api, $twig, $mailer, $configEmail, $rootPath)
    {
        parent::__construct($db, $api);
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->configEmail = $configEmail;
        $this->rootPath = $rootPath;
    }

    /**
     * Send forget password email with password in it
     * @param  string $toEmail  the user email
     * @param  string $username user name, will be in email
     * @return integer          number of message sended
     */
    public function sendWelcomeEmail($toEmail, $username){

        $rendered = $this->twig->render(
            self::$rootsEmail.self::$welcomePath,
            array(
                "rootPath"      => $this->rootPath,
                "name"      => $username
            )
        );

        $message = \Swift_Message::newInstance()
            ->setSubject(self::$welcomeTitle)
            ->setFrom(array($this->configEmail['senderEmail']['email'] => $this->configEmail['senderEmail']['name']))
            ->setTo(array($toEmail))
            ->setContentType("text/html; charset=UTF-8")
            ->setBody($rendered, 'text/html')
        ;

        return $this->mailer->send($message, $failure);
    }

    /**
     * Send forget password email with password in it
     * @param  string $toEmail  the user email
     * @param  string $username user name, will be in email
     * @param  string $password the password
     * @return integer          number of message sended
     */
    public function sendForgetPassword($toEmail, $username, $password){

        $rendered = $this->twig->render(
            self::$rootsEmail.self::$passwordForgetPath,
            array(
                "rootPath"      => $this->rootPath,
                "name"      => $username,
                "password"  => $password
            )
        );

        $message = \Swift_Message::newInstance()
            ->setSubject(self::$passwordForgetTitle)
            ->setFrom(array($this->configEmail['senderEmail']['email'] => $this->configEmail['senderEmail']['name']))
            ->setTo(array($toEmail))
            ->setContentType("text/html; charset=UTF-8")
            ->setBody($rendered, 'text/html')
        ;

        return $this->mailer->send($message, $failure);
    }

    /**
     * Send contact email
     * @param  array $dataForm the form data
     * @return integer         number of messages sended
     */
    public function sendContact($dataForm){
        $data["rootPath"] = $this->rootPath;
        $data = array_merge($data, $dataForm);

        $content =  "Nom : " . $dataForm['name'] .
                    "\nEmail: " . $dataForm['email'].
                    "\nMessage: " . $dataForm['message'].
                    "\n\n\nà : " . date('r');

        $message = \Swift_Message::newInstance()
            ->setSubject(self::$contactTitle)
            ->setFrom(array($this->configEmail['senderEmail']['email'] => $this->configEmail['senderEmail']['name']))
            ->setTo(array($this->configEmail['senderEmail']['email']))
            ->setContentType("text/html; charset=UTF-8")
            ->setBody($content, 'text/html')
        ;

        return $this->mailer->send($message, $failure);
    }

}

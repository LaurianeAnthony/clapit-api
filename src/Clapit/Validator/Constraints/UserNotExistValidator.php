<?php

namespace Clapit\Validator\Constraints;

use Doctrine\DBAL\Connection;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UserNotExistValidator extends ConstraintValidator
{
    private $db;
    private $session;

    public function validate($value, Constraint $constraint)
    {
        $queryUserNotExist = "SELECT * FROM users WHERE email='$value' LIMIT 0,1 ";
        $result = $this->db->fetchAll($queryUserNotExist, array());

        $userSession = $this->session->get('user');

        if( ! empty( $result ) && $userSession['id'] != $result[0]['id']  ){

            $this->context->addViolation($constraint->existMessage, array('%string%' => $value));

            return false;
        }

        return true;
    }

    public function setDb(Connection $db)
    {
        $this->db = $db;
    }
    public function setSession(Session $session)
    {
        $this->session = $session;
    }
}
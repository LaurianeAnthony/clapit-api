<?php

namespace Clapit\Validator\Constraints;

use Doctrine\DBAL\Connection;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UserExistValidator extends ConstraintValidator
{
    private $db;

    public function validate($value, Constraint $constraint)
    {

        $queryUserExist = "SELECT * FROM users WHERE email='$value' LIMIT 0,1 ";
        $result = $this->db->fetchAll($queryUserExist, array());

        if( empty( $result ) ){

            $this->context->addViolation($constraint->notExistMessage, array('%string%' => $value));

            return false;
        }

        return true;
    }

    public function setDb(Connection $db)
    {
        $this->db = $db;
    }
}
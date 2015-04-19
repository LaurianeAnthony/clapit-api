<?php

namespace Clapit\Validator\Constraints;

use Doctrine\DBAL\Connection;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PostalCodeValidator extends ConstraintValidator
{
    private $db;

    public function validate($value, Constraint $constraint)
    {
        if( !(is_numeric($value) && ( strlen($value)==4  || strlen($value)==5)) && !empty($value)){

            $this->context->addViolation($constraint->existMessage, array('%string%' => $value));

            return;
        }

        return;
    }
}
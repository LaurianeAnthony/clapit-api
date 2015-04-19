<?php

namespace Clapit\Validator\Constraints;

use Doctrine\DBAL\Connection;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Activated user form validator
 *
 * Author : Hugo <h.gresse@creads.org>
 */
class UserActiveValidator extends ConstraintValidator
{
    private $db;

    /**
     * CHeck if user is activated or not
     * @param  form value     $value      the form element value
     * @param  Constraint $constraint the constraint
     * @return booleand               false if not valide, true otherweise
     */
    public function validate($value, Constraint $constraint)
    {

        $queryUserActive = "SELECT active FROM users WHERE email='$value' LIMIT 0,1 ";
        $result = $this->db->fetchAll($queryUserActive, array());

        if( empty( $result ) || 0 == $result[0]['active'] ){
            $this->context->addViolation($constraint->notActiveMessage, array('%string%' => $value));
            return false;
        }

        return true;
    }

    public function setDb(Connection $db)
    {
        $this->db = $db;
    }
}
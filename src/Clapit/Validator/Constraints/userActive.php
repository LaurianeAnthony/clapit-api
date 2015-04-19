<?php

namespace Clapit\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UserActive extends Constraint
{
    public $notActiveMessage = 'This user is not activated.';
    public $field;

    public function validatedBy()
    {
        return 'validator.userActive';
    }
}
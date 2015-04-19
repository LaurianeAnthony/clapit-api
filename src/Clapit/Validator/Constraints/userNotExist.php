<?php

namespace Clapit\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UserNotExist extends Constraint
{
    public $existMessage = 'L\'adresse email %string% est déjà utilisée.';
    public $field;

    public function validatedBy()
    {
        return 'validator.userNotExist';
    }
}
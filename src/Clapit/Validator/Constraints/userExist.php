<?php

namespace Clapit\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UserExist extends Constraint
{
    public $notExistMessage = 'Impossible de trouver l\'utilisateur %string%.';
    public $field;

    public function validatedBy()
    {
        return 'validator.userExist';
    }
}
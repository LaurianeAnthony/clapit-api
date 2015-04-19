<?php

namespace Clapit\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class PostalCode extends Constraint
{
    public $existMessage = 'Le code postal %string% n\'est pas correct.';
    public $field;

    public function validatedBy()
    {
        return 'validator.postalCode';
    }
}
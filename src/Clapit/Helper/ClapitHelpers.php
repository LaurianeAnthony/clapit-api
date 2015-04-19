<?php

namespace Clapit\Helper;

use Symfony\Component\Form\Form;
use Symfony\Component\Validator\ConstraintViolationList;

class ClapitHelpers
{

    private $websiteUrl;
    
    public function __construct($websiteUrl){
        $this->websiteUrl = $websiteUrl;
    }

    public function formErrorSerializer(Form $form)
    {
        $errors = array();

        foreach($form->getErrors(true, false) as $error) {

            if(get_class($error) == "Symfony\Component\Form\FormError"){
                continue;
            }

            foreach ($error->getForm()->getErrors() as $key => $singleError) {
                $errors[$error->getForm()->getName()][] = $singleError->getMessage();
            }
        }
        return $errors;
    }
    public function constraintViolationListSerializer(ConstraintViolationList $violationList)
    {
        $errors = array();

        $errors = array();
        foreach ($violationList as $violation){
            $field = preg_replace('/\[|\]/', "", $violation->getPropertyPath());
            $error = $violation->getMessage();
            $errors[$field] = $error;
        }

        return $errors;
    }

}
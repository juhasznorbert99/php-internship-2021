<?php

namespace App\Core;

class Validation
{
    protected $validationRules;
    public function __construct()
    {
        $this->validationRules =  new ValidationRules();
    }

    public function check($rules,$request,$errors){
        $errorReturned = array();
        $counter=0;
        foreach ($rules as $rule){
            if($rule == "empty"){
                if($this->validationRules->checkEmptyEmail($request['email']) == true){
                    $errorReturned[$counter] = $errors[$counter];
                    $counter++;
                }
            }
            if($rule=="valid"){
                if($this->validationRules->checkValidEmail($request['email']) == false){
                    $errorReturned[$counter] = $errors[$counter];
                    $counter++;
                }
            }
        }
        return $errorReturned;
    }
}
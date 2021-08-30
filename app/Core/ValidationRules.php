<?php

namespace App\Core;

class ValidationRules
{
    public function checkEmptyEmail($email){
        if($email=="")
            return true;
        return false;
    }
    public function checkValidEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }
}
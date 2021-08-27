<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    function customError($errno, $errstr) {
        echo "<b>Error:</b> [$errno] $errstr";
    }
    //set error handler
    set_error_handler("customError");
    //trigger error
    //echo($test);
    //trigger_error('message here');
    //throw new Exception($test);

    class CustomException extends Exception {
        public function errorMessage() {
            $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
                .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
            return $errorMsg;
        }
    }
    $email = "someone@example.com";
    try {
    //check if
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            throw new customException($email);
        }
    }
    catch (CustomException $e) {
        echo "here custom exception";
        echo $e->errorMessage();
    }
    catch (Exception $ex){
        echo $ex->errorMessage();
    }
    function myException($exception) {
        echo "<b>Exception:</b> " . $exception->getMessage();
    }
    set_exception_handler('myException');
    throw new Exception('Uncaught Exception occurred');


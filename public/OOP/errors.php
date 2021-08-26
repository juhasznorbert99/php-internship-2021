<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    function customError($errno, $errstr) {
        echo "<b>Error:</b> [$errno] $errstr";
    }
    //set error handler
    set_error_handler("customError");
    //trigger error
    echo($test);

<?php

namespace App\Core;

    class Session
    {
        public function setSession($key,$value){
            if(!isset($_SESSION))
                session_start();
            $_SESSION[$key] = $value;
        }
        public function getSession($key){
            if(!isset($_SESSION))
                session_start();
            if(isset($_SESSION[$key]))
                return $_SESSION[$key];
            return "";
        }
        public function unsetSession($key){
            if(!isset($_SESSION))
                session_start();
            if(isset($_SESSION[$key]))
                unset($_SESSION[$key]);
        }
        public function checkSession($key){
            if(!isset($_SESSION))
                session_start();
            if(isset($_SESSION[$key]))
                return 1;
            return 0;
        }
        public function setArraySession($key,$index,$value){

            if(!isset($_SESSION))
                session_start();
            $_SESSION[$key][$index] = $value;
        }
    }
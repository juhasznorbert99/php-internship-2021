<?php

namespace App\Core;

class Config
{
    public function get($data){
        $result = explode('.',$data);
        if($result[0] == 'url'){
            $config = require  '../../config.php';
            return $config[$result[0]];
        }elseif ($result[0] == 'database'){
            $config = require  '../../database-config.php';
            if(count($result)>1){
                return $config[$result[0]][$result[1]];
            }else{
                return $config[$result[0]];
            }
        }
    }
}
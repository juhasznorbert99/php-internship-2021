<?php

    $config = require_once '../config.php';

    session_start();
    $index = $_GET("id");
    $quantity = $_GET("quantity");
    var_dump($index);
    var_dump($quantity);
//    header('Location: '.$config['url'].'test-controller');
//    //echo json_encode($_SESSION['cart']);
//    die();

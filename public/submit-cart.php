<?php


    $config = require_once '../config.php';
    //session_start();
    if(isset($_POST['id']) && isset($_POST['quantity'])){
        $index = $_POST['id'];
        $quantity = $_POST["quantity"];
        //var_dump($index);
        //var_dump($quantity);

        $products_path = '..\data\products.php';
        $products = include($products_path);
        //var_dump($products);
        $sum = 0;
        //find the price for each product and add this to a sum multiplied by the quantity numbers

        foreach($index as $key => $value){
            foreach($products as $products_value){
                if($value == $products_value['id']){
                    $sum+=(int)$products_value['price']*(int)$quantity[$key];
                }
            }
        }
        session_start();
        unset($_SESSION['cart']);
        $_SESSION['sum'] = $sum;
    }

    echo($config['url'].'test-controller');
    //header('Location: '.$config['url'].'test-controller');
    exit();

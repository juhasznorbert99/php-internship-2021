<?php

$config = require_once '../config.php';

// TODO - work with the $_REQUEST and $_SESSION['cart'] and update accordingly

session_start();
$id = $_GET['id'];
//
$cart_array = array();
if(isset($_SESSION['cart'])){
    $cart_array = $_SESSION['cart'];
}
if(!in_array($id,$cart_array))
    $cart_array[] = $id;

$_SESSION['cart'] = $cart_array;
//this is used to redirect the page back to index.php after adding product to cart
header('Location: '.$config['url'].'test-controller');

die();

<?php
require_once '../vendor/autoload.php';
$config = require_once '../config.php';

// TODO - work with the $_REQUEST and $_SESSION['cart'] and update accordingly

session_start();
$sort = $_GET['sort'];
//
if(!isset($_SESSION['sort'])){
    $array_sort = array("name"=> "asc");
    $_SESSION['sort'] = $array_sort;
}else{
    if(!array_key_exists($sort,$_SESSION['sort'])){
        $array_sort = array();
        $array_sort[$sort] = "asc";
        unset($_SESSION['sort']);
        $_SESSION['sort'] = $array_sort;
    }
}
if($_SESSION['sort'][$sort]=="asc")
    $_SESSION['sort'][$sort]="desc";
else
    $_SESSION['sort'][$sort]="asc";

$products_path = '../data/products.php';
$new_data = include($products_path);


header('Location: '.$config['url'].'test-controller');

die();

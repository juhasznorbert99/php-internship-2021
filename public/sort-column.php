<?php
require_once '../vendor/autoload.php';
$config = require_once '../config.php';

// TODO - work with the $_REQUEST and $_SESSION['cart'] and update accordingly

session_start();
$sort = $_GET['sort'];

$session = new \App\Core\Session();

if(!$session->checkSession('sort')){
    $array_sort = array("name"=> "asc");
    $session->setSession('sort',$array_sort);
}else{
    if(!array_key_exists($sort,$session->getSession('sort'))){
        $array_sort = array();
        $array_sort[$sort] = "asc";
        $session->unsetSession('sort');
        $session->setSession('sort',$array_sort);
    }
}
if($session->getSession('sort')[$sort]=="asc")
    $session->setArraySession('sort',$sort,"desc");
else
    $session->setArraySession('sort',$sort,"asc");

$products_path = '../data/products.php';
$new_data = include($products_path);


header('Location: '.$config['url'].'test-controller');

die();

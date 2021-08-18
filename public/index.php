<?php

require_once '../vendor/autoload.php';

setcookie("last-loaded",date('H:i:s'));

$request = new App\Core\Request();

$app = new App\Core\Application();

$app->handle($request);

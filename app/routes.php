<?php

use App\Core\Router;

$router = new Router();

$router->get('/test', function($request){
    echo 'test route';
    var_dump($request);
});

$router->get('/test-controller', 'TestController@test');

$router->get('/test-controller/cart', 'TestController@cart');

$router->get('/test-controller/users', 'TestController@users');

$router->get('/test-controller/login', 'TestController@login');

$router->get('/test-controller/register', 'TestController@register');

$router->get('/test-controller/confirm', 'TestController@confirm');

$router->get('/test-controller/orders', 'TestController@orders');

$router->get('/test-controller/categories', 'CategoriesController@index');

$router->get('/test-controller/categories/{id}/create', 'CategoriesController@create');

$router->get('/test-controller/categories/{id}', 'CategoriesController@delete');



return $router;

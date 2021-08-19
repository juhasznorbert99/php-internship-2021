<?php

namespace App\Controllers;

class TestController extends BaseController
{

    public function sortProducts(&$data){
        $products_path = basePath().'\data\products.php';
        $new_data = include($products_path);
        function sortTable(&$array, $type, $field){
            usort($array, function ($a,$b) use ($type, $field){
                if($type=="asc")
                    return strcmp($a[$field],$b[$field]);
                else
                    return strcmp($a[$field],$b[$field])*(-1);
            });
        }
        session_start();
        if(isset($_SESSION['sort']))
            foreach($_SESSION['sort'] as $key => $value)
                sortTable($new_data,$_SESSION['sort'][$key],$key);

        $data['products'] = $new_data;
    }
    public function test()
    {
        $data = [
            'username' => 'andrei.test',
            'firstName' => 'Andrei',
            'lastName' => 'Arba',
            'products' => []
        ];


        $this->sortProducts($data);

        $this->bladeResponse($data, 'products/list');
//        $this->jsonResponse($data);
//        $this->response($data, 'products/list');
    }
    public function cart(){
        $data = [];

        $this->bladeResponse($data, 'products/cart');
    }
}

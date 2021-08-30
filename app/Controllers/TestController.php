<?php

namespace App\Controllers;

class TestController extends BaseController
{

    protected $ana;

    public function getProductsFromDB(){
        $config = require_once '../database-config.php';
        $conn = mysqli_connect('localhost', $config['database'][0], $config['database'][1],
            $config['database'][2]);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `products`";
        $result =  mysqli_query($conn,$sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            $counter=0;
            while($row = mysqli_fetch_assoc($result)) {
                $items = [];
                $items['id'] = $row['id'];
                $items['name'] = $row['name'];
                $items['units'] = $row['units'];
                $items['price'] = $row['price'];
                $items['description'] = $row['description'];
                $data[$counter] = $items;
                $counter++;
            }
        }
        return $data;
    }

    public function sortProducts(&$data){
        $products_path = basePath().'\data\products.php';
        $new_data = include($products_path);

        $auxData = $this->getProductsFromDB();

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
                sortTable($auxData,$_SESSION['sort'][$key],$key);

        $data['products'] = $auxData;
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
        $data = [
            'items' => [],
            'products' => []
        ];

        $dbProducts = $this->getProductsFromDB();
        $data['products'] = $dbProducts;
        session_start();
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $key => $value){
                $data['items'][$key] = $value;
            }
        }

        $this->bladeResponse($data, 'products/cart');
    }
    public function users(){
        $data = [];

        $this->bladeResponse($data, 'products/users');
    }
    public function login(){
        $data = [];

        $this->bladeResponse($data, 'products/login');
    }
    public function register(){
        $data = [];

        $this->bladeResponse($data, 'products/register');
    }
    public function confirm(){
        $token = $_GET['token'];
        $data = ['token'=>$token];
        $this->bladeResponse($data, 'products/confirm');
    }
}

<?php

namespace App\Cart;
require "CartInterface.php";

class Cart implements \CartInterface
{
    public function __construct()
    {

    }
    function getProductsFromDB($conn){
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
}
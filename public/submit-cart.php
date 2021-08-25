<?php

    require_once '../vendor/autoload.php';
    $config = require_once '../database-config.php';
    $conn = mysqli_connect('localhost', $config['database'][0], $config['database'][1], $config['database'][2]);
    var_dump($config);
    function getProductsFromDB(){

        global $conn;
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

    function insertIntoOrders(){
        global $conn;
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        try {
            $sql = "INSERT INTO `orders` values('');";
            mysqli_query($conn, $sql);
        }catch (Exception $ex){
            var_dump($ex);
        }
    }
    function lastOrderID(){
        global $conn;
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $id=0;
        $sql = "SELECT * FROM `orders`";
        $result =  mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
            }
        }
        return $id;
    }
    function findPricesByID($ids){
        $prices = [];
        $counter=0;
        foreach ($ids as $id){
            global $conn;
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM `products`";
            $result =  mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($id == $row['id']){
                        $prices[] = $row['price'];
                    }
                }
            }
        }
        return $prices;
    }
    function checkProductsQuantity($index, $quantity){
        global $conn;
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `products`";
        $result =  mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $counter=0;
                foreach ($index as $i){
                    if($row['id']==$i){
                        if($row['units']<$quantity[$counter])
                            return 0;
                    }
                    $counter++;
                }
            }
        }
        return 1;
    }
    function sendEmail($string){
        $email = $_POST['email'];
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('norbertjuhasz99')
            ->setPassword('darksoul00');
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message('First email'))
            ->setFrom(['norbertjuhasz99@gmail.com' => 'LIDL'])
            ->setTo([$email => 'This has a name'])
            ->setBody($string);
        try{

            $result = $mailer->send($message);
            //var_dump($result);
        }catch (Exception $er){
            var_dump($er);
        }
    }
    function insertIntoOrderItems($index,$prices,$quantity,$id){
        global $conn;
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(checkProductsQuantity($index,$quantity)){
            for($i=0;$i<count($index);$i++){
                $stm = $conn->prepare("INSERT INTO `order_items` (order_id, product_id, units, price) VALUES (?, ?, ?, ?);");
                $orderID = $id;
                $orderProductID = $index[$i];
                $orderUnits = $quantity[$i];
                $orderPrices = $prices[$i];
                $stm->bind_param("iiid",$orderID,$orderProductID,$orderUnits,$orderPrices);
                $stm->execute();
                $stm->close();
            }
            sendEmail("Success");
            //update database
        }else{
            sendEmail("Fail");
        }
    }
    $config = require_once '../config.php';
    //session_start();
    if(isset($_POST['id']) && isset($_POST['quantity'])){
        $index = $_POST['id']; // id-ul produsului i
        $quantity = $_POST["quantity"]; //cantitatea din produsul i
        $dbProducts = getProductsFromDB();
        //var_dump($products);
        $sum = 0;
        //find the price for each product and add this to a sum multiplied by the quantity numbers

        foreach($index as $key => $value){
            foreach($dbProducts as $products_value){
                if($value == $products_value['id']){
                    $sum+=(int)$products_value['price']*(int)$quantity[$key];
                }
            }
        }


        insertIntoOrders();
        $id = lastOrderID();
        $prices = findPricesByID($index);
        insertIntoOrderItems($index,$prices,$quantity,$id);
        mysqli_close($conn);


        if(!isset($_SESSION))
            session_start();
        unset($_SESSION['cart']);
        $_SESSION['sum'] = $sum;
    }
    //echo($config['url'].'test-controller');
    //header('Location: '.$config['url'].'test-controller');
    exit();

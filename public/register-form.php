<?php
    $config = require_once '../config.php';
    $database = require_once '../database-config.php';

    if(!isset($_SESSION))
        session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $_SESSION["register-address"] = "*";
    $_SESSION["register-email"] = "*";
    $_SESSION["register-firstname"] = "*";
    $_SESSION["register-lastname"] = "*";
    $_SESSION["register-phone"] = "*";
    $_SESSION["register-password"] = "*";
    $_SESSION["register-display-error"];
    $check = 1;
    if($email==""){
        $_SESSION["register-email"] = "*Email required";
        $check=0;
    }
    if($password==""){
        $_SESSION["register-password"] = "*Password required";
        $check=0;
    }
    if($firstname==""){
        $_SESSION["register-firstname"] = "*First Name required";
        $check=0;
    }
    if($lastname==""){
        $_SESSION["register-lastname"] = "*Last Name required";
        $check=0;
    }
    if($phone==""){
        $_SESSION["register-phone"] = "*Phone Number required";
        $check=0;
    }
    if($address==""){
        $_SESSION["register-address"] = "*Address required";
        $check=0;
    }

    $conn = mysqli_connect('localhost', $database['database'][0], $database['database'][1],
        $database['database'][2]);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $okay = 1;
    $sql = "SELECT Email from `user`;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row['Email'] == $email)
                $okay=0;
        }
    }

    if($check){
        if($okay){
            // can be added to db
            $stm = $conn->prepare("INSERT INTO `user` (LastName, FirstName, Address, Email, PhoneNumber, MD5Password,Confirmed, Token) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            $nr = 32;
            $token = substr(str_shuffle($data), 0, $nr);
            $confirmed = 0;
            $stm->bind_param("ssssssis",$lastname,$firstname,$address,$email,$phone,md5($password),$confirmed,$token);
            $stm->execute();
            $_SESSION['register-display-error'] = "";
            header('Location: '.$config['url'].'test-controller');
        }else{
            $_SESSION['register-display-error'] = "Email already used";
            header('Location: '.$config['url'].'test-controller/register');
        }
    }else{
        $_SESSION['register-display-error'] = "All Fields must be completed";
        header('Location: '.$config['url'].'test-controller/register');
    }


    exit();
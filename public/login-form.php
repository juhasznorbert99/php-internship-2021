<?php
    $config = require_once '../config.php';
    $database = require_once '../database-config.php';
    $email = $_POST['email'];
    $check = 1;
    $display_error = "";
    if(!isset($_SESSION))
        session_start();

    $_SESSION["login-email"] = "*";
    $_SESSION["login-password"] = "*";
    if($email==""){
        $_SESSION["login-email"] = "*Email required";
        $check=0;
    }
    else
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["login-email"] = "*Invalid email format";
            $check=0;
        }else{
            $_SESSION["login-email"] = "*";
        }
    $password = $_POST['password'];
    if($password==""){
        $_SESSION["login-password"] = "*Password required";
        $check=0;
    }

    $conn = mysqli_connect('localhost', $database['database'][0], $database['database'][1],
        $database['database'][2]);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $okay = 0;
    $sql = "SELECT Email, MD5Password from `user`;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['MD5Password'];
            echo "</br>";
            if($row['Email']==$email && md5($password) == $row['MD5Password'])
                $okay=1;
        }
    }

    if($check){
        if($okay){
            $_SESSION['display-error'] = "";
            $_SESSION['email'] = $email;
            header('Location: '.$config['url'].'test-controller');
        }
        else{
            $_SESSION['display-error'] = "Password or Email incorrect";
            header('Location: '.$config['url'].'test-controller/login');
        }
        exit();
    }
    else{
        $_SESSION['display-error'] = "Password and Email are required";
        header('Location: '.$config['url'].'test-controller/login');
        exit();
    }

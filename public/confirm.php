<?php

require '../app/Core/Config.php';
$config = new \App\Core\Config();

if(!isset($_SESSION))
    session_start();
if(isset($_SESSION["token"]))
    $token = $_SESSION["token"];
$conn = mysqli_connect('localhost', $config->get('database.0'), $config->get('database.1'),
    $config->get('database.2'));
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$okay=0;
$sql = "SELECT Token from `user`;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row['Token']==$token){
            $okay=1;
        }
    }
}
$_SESSION['token-response'] = "";
if($okay){
    //set confirm to 1
    $stm = $conn->prepare("UPDATE `user` SET confirmed=1 where Token = ?");
    $stm->bind_param("s",$token);
    $stm->execute();
    $stm->close();
    header('Location: '.$config->get('url').'test-controller');
}else{
    $_SESSION['token-response'] = "Token doesn't exists";
    header('Location: '.$config->get('url').'test-controller/confirm?token='.$token);
}
exit();
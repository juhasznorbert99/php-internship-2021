<?php
    //https://stackoverflow.com/questions/9122/select-all-columns-except-one-in-mysql
    $config = require_once '../database-config.php';
    $conn = mysqli_connect('localhost', $config['database'][0], $config['database'][1],
        $config['database'][2]);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $table_cols = ['LastName','FirstName'];
    $sql = "INSERT INTO `user` (LastName, FirstName, Address, Email, PhoneNumber, MD5Password,Confirmed, Token) VALUES ('Juhasz', 'Norbert', 'Cluj', 'norbertjuhasz99@gmail.com','0771657800','07217fee5c2eaa9592c22a1b455af0a8',1,'1234asdf');";
    $sql.= "INSERT INTO `user` (LastName, FirstName, Address, Email, PhoneNumber, MD5Password,Confirmed, Token) VALUES ('Juhasz2', 'Norbert2', 'Oradea', 'norbertjuhasz99@gmail.com','0771657800','5fb6a57e79df3e79cc3a1d8fa229418f',1,'1234asdf');";
    //mysqli_multi_query($conn, $sql);
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<table id='user-table'>";
        $counter=0;
        while($row = mysqli_fetch_assoc($result)) {
            if($counter==0){

                echo "<tr>";
                foreach ($row as $key => $value){

                    echo "<th>".$key."</th>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($row as $key => $value)
                echo "<td>".$row[$key]."</td>";
            echo "</tr>";
            $counter=1;
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
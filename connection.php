<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "addtocart";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error === true){
        die("Connection Error".$conn->connect_error);
    }

    
?>
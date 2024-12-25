<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Book-Store";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        echo"Failed to connect".mysqli_connect_error();
        exit();
    }
    // echo"Connection Successfully";

?>
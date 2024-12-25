
<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "";

    $conn = mysqli_connect($servername,$username,$password,$dbname)

    if(!$conn){
        echo"database not connected ".mysqli_connect_error();
        exit();
    }
    echo"databse connected";

?>
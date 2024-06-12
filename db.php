<?php
    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dataname = "qlsv";
        $conn = new mysqli($servername, $username, $password, $dataname);
        mysqli_set_charset($conn, "utf8mb4");

        if($conn->connect_error) {
            die($conn->connect_error);
        } else {
         
        }
        return $conn;
    }
?>

<?php
    //session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ffstore";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Ket noi csdl bi loi: " . $conn->connect_error);
    }


?>
<?php
    include('./qluser.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new khachhang();
        $data->MaKH = $_GET["id"];
        $data  =  $data->Xoakhachhang($conn,$baseUrl);
    }
?>
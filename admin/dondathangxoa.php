<?php
    include('dondathang.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new dondathang();
        $data->MaDDH = $_GET["id"];
        $data  =  $data->XoaDDH($conn,$baseUrl);
    }
?>
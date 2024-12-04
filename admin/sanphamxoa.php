<?php
    include('./sanpham.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new SanPham();
        $data->MaSP = $_GET["id"];
        $data  =  $data->XoaSanPham($conn,$baseUrl);
    }
?>
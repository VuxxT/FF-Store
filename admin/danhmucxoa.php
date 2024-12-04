<?php
    include('./danhmuc.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data = new danhmuc();
        $data->MaLoaiSP = $_GET["id"];
        $data  =  $data->XoaDanhMucSP($conn,$baseUrl);
    }
?>
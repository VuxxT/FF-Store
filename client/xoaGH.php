<?php
    include('./giohang.php');
    if(isset($_GET["id"])){
        $id = isset($_GET["id"]);
        $data->MaKH = $_GET["id"];
        $sql = "DELETE FROM giohang WHERE MaSP="$id";"
    }
?>
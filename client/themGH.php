<?php

    // Gọi hàm selectSanPham để lấy danh sách sản phẩm
    include('../admin/sanpham.php');

    $SP = SanPham::laySP($conn,$_GET["id"]);

    SanPham::them_gio_hang($SP);


    header("Location: $baseUrl?p=giohang&&id=$SP->MaSP");
    exit();

?>
<?php
    session_start();
    $baseUrl = $_SERVER['PHP_SELF'];
    $pages = array(
        'home' => array('Trang Chủ', 'home.php'),
        'spct' => array('Chi Tiết Sản Phẩm', 'chitietsp.php'),
        'themGH' => array('Them gio hang', 'themGH.php'),
        'giohang' => array('Giỏ Hàng', 'giohang.php'),
        'xoagh' => array('Xóa Giỏ Hàng','xoaGH.php'),
        'tcadmin' => array('Trang Chủ', './admin/trangchinh.php'),
        'dktk' =>array('Đăng Kí Tài Khoản','dangkiview.php'),
        'dn' =>array('Đăng nhập Tài Khoản','dangnhap.php'),
        'timkiem' => array('Tìm Kiếm','timkiem.php'),
        'thoat' => array('Thoát','logout.php'),
        'danhmuc' => array('','danhmucview.php'),
        'phantrang' => array('phantrang', 'phantrang.php'),
        'thanhtoan' =>array('','thanhtoan.php'),
        'ttkh'=>array('Thông Tin Khách Hàng','thongtinkhachhang.php'),
        'xoagh' => array('','xoasanpham.php'),
        'dathang' => array('','dathang.php'),
        'ctdondathang' =>array('Chi Tiết Đơn Đặt ','chitietdondathang.php')
        
    );

    include('../client/connectdb.php'); 
    //include('../admin/theme.php'); 
    include('../client/theme.php')

?>
<?php

    $baseUrl = $_SERVER['PHP_SELF'];
    $pages = array(
        // Danh mục 
        'danhmuc' => array('Quản lý Danh Mục', 'danhmucView.php'),
        'danhmucth' => array('Thêm  Danh Mục', 'danhmucthem.php'),
        'danhmucsua' => array('Sửa Danh Mục', 'danhmucsua.php'),
        'danhmucxoa' => array('Xóa Danh Mục', 'danhmucxoa.php'),
        // Sản phẩm
        'sp' => array('Quản lý Sản Phẩm', 'sanphamview.php'),
        'spth' => array('Thêm Sản phẩm', 'sanphamthem.php'),
        'spsua' => array('Sửa Sản phẩm', 'sanphamsua.php'),
        'spxoa' => array('Xóa Sản phẩm', 'sanphamxoa.php'),
        // Trang chính
        'trangchinh' => array('Trang Chính', 'trangchinh.php'),
        'tcclient' => array('Trang Chủ', './client/home.php'),
        'dangnhap' => array('Đăng nhập Tài Khoản', './client/dangnhap.php'),
        // Đặt Hàng 
        'order' => array('Quản Lý Đơn Đặt Hàng', 'dondathangView.php'),
        'ordersua' => array('Sửa Đơn Đặt Hàng', 'dondathangsua.php'),
        'orderxoa' => array('Xóa Đơn Đặt Hàng', 'dondathangxoa.php'),
        // khách hàng
        'user' => array('Quản Lý Khách Hàng ', 'qluserview.php'),
        'userth' => array('Theme Thông Tin Khách Hàng ', 'qluserthem.php'),
        'usersua' => array('Sửa Thông Tin Khách Hàng ', 'qlusersua.php'),
        'userxoa' => array('Xóa Thông Tin Khách Hàng  ', 'qluserxoa.php'),
        // phân trang
        'logout' => array('','logout.php'),
        
    );
    //connect các trang 
    include('../client/connectdb.php');
    //include('../client/theme.php'); 
    include('../admin/theme.php')

?>
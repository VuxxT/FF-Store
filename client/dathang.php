<?php

	include('../client/connectdb.php');
    
    
    $idkhachhang =  $_SESSION['Ma_khachhang'];
    $tenkhachhang =  $_SESSION['Ten_khachhang'];
	$total = 0;
    
	if(isset($_SESSION['GioHang'])){
		//thêm giỏ hàng chi tiết
		foreach($_SESSION['GioHang'] as $key => $value){
			$id_sanpham=$value['MaSP'];
			$soluong=$value['SoLuong'];
            $subtotal = $value['Gia'] * $value['SoLuong'];
            $total += $subtotal;
			
			$insert_order_details = "INSERT INTO dondathang(MaKH,TenKH,MaSP,TongThanhTien) VALUE('".$idkhachhang."','".$tenkhachhang."','".$id_sanpham."','".$subtotal."')";
			if(mysqli_query($conn,$insert_order_details)){
                $message = "Đặt Hàng Thành Công";
            }

           
		}
	}
	header("Location: $baseUrl?p=home&message=". urlencode($message));
	exit();
?>
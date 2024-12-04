<?php

class dangnhap{

    public $Email;
    public $MatKhau;


    public function DN($conn,$baseUrl){

      
    //Xử lý đăng nhập
       $sql =  "SELECT Email, MatKhau FROM khachhang WHERE Email = '$this->Email' and MatKhau = '$this->MatKhau' ";

        if($result = mysqli_query($conn, $sql)){
            $message = "Đăng nhập Thành công";
            header("Location: $baseUrl?p=order&message=" . urlencode($message));
           
        }else{
            echo "Tên đăng nhập hoặc mật khẩu không đúng!"; 
        }
        
       
    }
}
?>
<?php
    class DKKhachHang{
        public $MaKH;
        public $HoTenKH;
        public $GioiTinh;
        public $DiaChi;
        public $SDT;
        public $Email;
        public $NgaySinh;
        public $MatKhau;

    //đăng kí 
        public function ThemKH($conn,$baseUrl) {
                    
            // Thông báo cần gửi
            $message = "Lỗi khi đăng kí";
        

            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO  khachhang (HoTenKH,GioiTinh,DiaChi,SDT,Email,NgaySinh,MatKhau) VALUES ('$this->HoTenKH','$this->GioiTinh', '$this->DiaChi', '$this->SDT','$this->Email','$this->NgaySinh','$this->MatKhau')";
            
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Tạo Tài Khoản Thành Công";
            }else{
                $message = "Tạo Tài Khoản Không Thành Công";
            }
            // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: ../client/dangnhap.php");
            exit();
        }






}




?>
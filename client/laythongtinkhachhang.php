<?php
     class khachhang {
        public $MaKH;
        public $HoTenKH;
        public $GioiTinh;
        public $DiaChi;
        public $SDT;
        public $Email;
        public $NgaySinh;
        public $MatKhau;

        //lấy thông tin danh mục 
        public static function laykhachhang($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM khachhang WHERE Email = '$id'";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $khachhang = new khachhang();
            $row = mysqli_fetch_assoc($result);
            $khachhang->MaKH = $row['MaKH'];
            $khachhang->HoTenKH = $row['HoTenKH'];
            $khachhang->GioiTinh = $row['GioiTinh'];
            $khachhang->DiaChi = $row['DiaChi'];
            $khachhang->SDT = $row['SDT'];
            $khachhang->Email = $row['Email'];
            $khachhang->NgaySinh = $row['NgaySinh'];
            $khachhang->MatKhau = $row['MatKhau'];
        
            // Trả về đối tượng khachhang
            return $khachhang;
        }

        public function SuaKhachHang($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi Sửa thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE khachhang SET HoTenKH = '$this->HoTenKH', GioiTinh = '$this->GioiTinh', DiaChi = '$this->DiaChi', SDT = '$this->SDT', Email = '$this->Email', NgaySinh = '$this->NgaySinh', MatKhau='$this->MatKhau'  WHERE MaKH = $this->MaKH";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sửa Khách Hàng thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=user&message=" . urlencode($message));
            exit();
        }






     }
?>
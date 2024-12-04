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

        public static function layDanhSach($conn) {

            $Dskhachhang = array();
            $sql = "SELECT * FROM khachhang";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $khachhang_obj = new khachhang();
                    $khachhang_obj->MaKH = $row["MaKH"];
                    $khachhang_obj->HoTenKH = $row["HoTenKH"];
                    $khachhang_obj->GioiTinh = $row["GioiTinh"];
                    $khachhang_obj->DiaChi = $row["DiaChi"];
                    $khachhang_obj->SDT = $row["SDT"];
                    $khachhang_obj->Email = $row["Email"];
                    $khachhang_obj->NgaySinh = $row["NgaySinh"];
                    $khachhang_obj->MatKhau=$row["MatKhau"];
                    $Dskhachhang[] = $khachhang_obj;
                }
            }
    
            return $Dskhachhang;

        }

          //lấy thông tin danh mục 
            public static function layDanhSachKhachHang($conn, $id) {
                // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
                $sql = "SELECT * FROM khachhang WHERE MaKH = $id";
            
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
        

        //Sửa Sản phẩm trong danh mục

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

        //Xóa sản phẩm trong danh mục

        public function Xoakhachhang($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi Xóa khách hàng";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM khachhang WHERE MaKH = $this->MaKH";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xóa Khách Hàng Thành Công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=user&message=" . urlencode($message));
            exit();
        }
       
    }

?>
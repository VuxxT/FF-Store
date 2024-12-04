<?php

    class danhmuc {
        public $MaLoaiSP;
        public $TenLoaiSP;


        public static function layDanhSach($conn ) 
        {

            $Dsdanhmuc = array();
            $sql = "SELECT * FROM danhmuc";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Lặp qua các dòng kết quả
                while($row = $result->fetch_assoc()) {
                    // Tạo đối tượng danh mục và đưa vào mảng
                    $danhmuc_obj = new danhmuc();
                    $danhmuc_obj->MaLoaiSP = $row["MaLoaiSP"];
                    $danhmuc_obj->TenLoaiSP = $row["TenLoaiSP"];
                    $Dsdanhmuc[] = $danhmuc_obj;
                }
            }
    
            return $Dsdanhmuc;

        }
        //lấy thông tin danh mục 
        public static function layDanhmucSP($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM danhmuc WHERE MaLoaiSP = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $danhmuc = new danhmuc();
            $row = mysqli_fetch_assoc($result);
            $danhmuc->MaLoaiSP = $row['MaLoaiSP'];
            $danhmuc->TenLoaiSP = $row['TenLoaiSP'];
        
            // Trả về đối tượng loaisp
            return $danhmuc;
        }

        // Thêm Sản Phẩm Vào Danh mục
        public function ThemDanhMucSP($conn,$baseUrl) {
            
            // Thông báo cần gửi
            $message = "Lỗi khi thêm thể loại";
        

            // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
            $sql = "INSERT INTO danhmuc (TenLoaiSP) VALUES ('$this->TenLoaiSP')";
            
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $message = "Thêm thể loại với $id thành công";
            }
            // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
            exit();
        }
        //Sửa Sản phẩm trong danh mục

        public function SuaDanhmucSP($conn,$baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi Sửa thể loại";
            // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
            $sql = "UPDATE danhmuc SET Tenloaisp = '$this->TenLoaiSP' WHERE Maloaisp = $this->MaLoaiSP";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Sửa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
            exit();
        }

        //Xóa sản phẩm trong danh mục

        public function XoaDanhMucSP($conn, $baseUrl) {
            // Thông báo cần gửi
            $message = "Lỗi khi Xóa thể loại";

            // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
            $sql = "DELETE FROM danhmuc WHERE MaLoaiSP = $this->MaLoaiSP";
        
            // thực thi câu truy vấn và kiểm tra kết quả
            if (mysqli_query($conn, $sql)) {
                $message = "Xóa thể loại với thành công";
            }
             // Chuyển hướng trang và truyền thông báo qua URL
            header("Location: $baseUrl?p=danhmuc&message=" . urlencode($message));
            exit();
        }
    }

?>
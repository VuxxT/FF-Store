<?php
include ('qluser.php');
include ('sanpham.php');

class dondathang {
    public $MaDDH;
    public $MaKH;
    public $TenKH;
    public $MaSP;
    public $TongThanhTien;
    public $TrangThaiDonDatHang;


    //select toàn bộ thông tin đơn hàng 
    public static function LayDSDDH($conn) {
        
        // Lấy danh sách sản phẩm
        $sql = "SELECT * FROM dondathang";
        $result = $conn->query($sql);

        $dondathangList = array();
      
        // Kiểm tra số lượng sản phẩm trả về
        if ($result->num_rows > 0) {
          
          while($row = $result->fetch_assoc()) {
            // Thêm sản phẩm vào danh sách
            // Tạo đối tượng danh mục và đưa vào mảng
            $khachhang_obj =  khachhang ::layDanhSachKhachHang($conn,$row["MaKH"]);
            $sanpham_obj = SanPham::laySP($conn,$row["MaSP"]);
            $ddh_obj = new dondathang();
            $ddh_obj->MaDDH = $row["MaDDH"];
            $ddh_obj->MaKH = $khachhang_obj->MaKH;
            $ddh_obj->TenKH = $row["TenKH"];
            $ddh_obj->MaSP = $sanpham_obj->TenSP;
            $ddh_obj->TongThanhTien = $row["TongThanhTien"];
            $ddh_obj->TrangThaiDonDatHang = $row["TrangThaiDonDatHang"];
            $dondathangList[] = $ddh_obj;
          }
        }
        return $dondathangList;
    }

    public static function layDDH($conn, $id) {
        // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
        $sql = "SELECT * FROM dondathang WHERE MaDDH = $id";
    
        // Thực hiện câu truy vấn và lấy kết quả
        $result = mysqli_query($conn, $sql);
        // Tạo đối tượng loaisp từ kết quả của câu truy vấn
        $ddh_obj = new dondathang();
        $row = mysqli_fetch_assoc($result);
        $ddh_obj->MaDDH = $row["MaDDH"];
        $ddh_obj->MaKH = khachhang :: layDanhSach($conn,$row["MaKH"]);
        $ddh_obj->TenKH = $row["TenKH"];
        $ddh_obj->MaSP = SanPham :: LayDSSanPham($conn,$row["MaSP"]);
        $ddh_obj->TongThanhTien = $row["TongThanhTien"];
        $ddh_obj->TrangThaiDonDatHang = $row["TrangThaiDonDatHang"];
        // Trả về đối tượng loaisp
        return $ddh_obj;
     
    }




    //thêm đơn đặt hàng từ giỏ hàng
    public function SuaDDH($conn,$baseUrl) {
      // Thông báo cần 
      $message = "Lỗi khi Sửa thể loại";
      // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
      $sql = "UPDATE dondathang SET TrangThaiDonDatHang = '$this->TrangThaiDonDatHang'  WHERE MaDDH = $this->MaDDH";
  
      // thực thi câu truy vấn và kiểm tra kết quả
      if (mysqli_query($conn, $sql)) {
          $message = "Cập Nhật Đơn Đặt Hàng thành công";
      }
       // Chuyển hướng trang và truyền thông báo qua URL
      header("Location: $baseUrl?p=order&message=" . urlencode($message));
      exit();
  
    }
    //Xóa Sản Phẩm 
    public function XoaDDH($conn, $baseUrl) {
      // Thông báo cần gửi
      $message = "Lỗi khi Xóa";

      // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
      $sql = "DELETE FROM dondathang WHERE MaDDH = $this->MaDDH";
  
      // thực thi câu truy vấn và kiểm tra kết quả
      if (mysqli_query($conn, $sql)) {
          $message = "Xóa Sản Phẩm Thành Công";
      }
       // Chuyển hướng trang và truyền thông báo qua URL
      header("Location: $baseUrl?p=order&message=" . urlencode($message));
      exit();
  }



  }

?>
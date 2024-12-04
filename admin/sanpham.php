<?php
include ('danhmuc.php');

class SanPham {
    public $MaSP;
    public $TenSP;
    public $Gia;
    public $HinhAnh;
    public $MoTaSP;
    public $TrangThaiSP;
    public $MaLoaiSP;
    public $SoLuong;
    



    public static function LayDSSanPham($conn, $tim="") {
        
        // Lấy danh sách sản phẩm
        $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%$tim%'";
        $result = $conn->query($sql);

        $sanPhamList = array();
      
        // Kiểm tra số lượng sản phẩm trả về
        if ($result->num_rows > 0) {
          
          while($row = $result->fetch_assoc()) {
            // Thêm sản phẩm vào danh sách
            // Tạo đối tượng danh mục và đưa vào mảng
            $danhmuc_obj = danhmuc::layDanhmucSP($conn,$row["MaLoaiSP"]);
            $sp_obj = new SanPham();
            $sp_obj->MaSP = $row["MaSP"];
            $sp_obj->TenSP = $row["TenSP"];
            $sp_obj->Gia = $row["Gia"];
            $sp_obj->HinhAnh = $row["HinhAnh"];
            $sp_obj->TrangThaiSP = $row["TrangThaiSP"];
            $sp_obj->MoTaSP = $row["MoTaSP"];
            $sp_obj->MaLoaiSP = $danhmuc_obj->TenLoaiSP;
            $sp_obj->SoLuong = $row["SoLuong"];
            $sanPhamList[] = $sp_obj;
          }
        }
        return $sanPhamList;
    }

    public static function laySP($conn, $id) {
        // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
        $sql = "SELECT * FROM sanpham WHERE MaSP = $id";
    
        // Thực hiện câu truy vấn và lấy kết quả
        $result = mysqli_query($conn, $sql);
        // Tạo đối tượng loaisp từ kết quả của câu truy vấn
        $sp_obj = new SanPham();
        $row = mysqli_fetch_assoc($result);
        $sp_obj->MaSP = $row["MaSP"];
        $sp_obj->TenSP = $row["TenSP"];
        $sp_obj->Gia = $row["Gia"];
        $sp_obj->HinhAnh = $row["HinhAnh"];
        $sp_obj->MoTaSP = $row["MoTaSP"];
        $sp_obj->TrangThaiSP = $row["TrangThaiSP"];
        $sp_obj->MaLoaiSP = danhmuc::layDanhmucSP($conn,$row["MaLoaiSP"]);
        $sp_obj->SoLuong = $row["SoLuong"];
        // Trả về đối tượng loaisp
        return $sp_obj;
     
    }

    //upload file ảnh 

    function uploadImage($file, $targetDirectory) {
      $targetFile = $targetDirectory . basename($file["name"]);
      $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
      
      // Tải lên tệp
      if (move_uploaded_file($file["tmp_name"], $targetFile)) {
          return true;
      } else {
          return false;
      }
    }



    //thêm sản phẩm
    public function ThemSP($conn,$baseUrl) {
            
      // Thông báo cần gửi
      $message = "Lỗi khi thêm thể loại";
  

      // tạo câu truy vấn để thêm đối tượng thể loại mới vào cơ sở dữ liệu
      $sql = "INSERT INTO sanpham (TenSP,Gia,HinhAnh,MoTaSP,TrangThaiSP,MaLoaiSP,SoLuong) VALUES ('$this->TenSP','$this->Gia', '$this->HinhAnh', '$this->MoTaSP','$this->TrangThaiSP','$this->MaLoaiSP', '$this->SoLuong')";
      
      // thực thi câu truy vấn và kiểm tra kết quả
      if (mysqli_query($conn, $sql)) {
          $id = mysqli_insert_id($conn);
          $message = "Thêm Sản Phẩm với $id thành công";
      }
      // Chuyển hướng trang và truyền thông báo qua URL
      header("Location: $baseUrl?p=sp&message=" . urlencode($message));
      exit();
    }
    //Sửa Sản Phẩm
    public function SuaSP($conn,$baseUrl) {
      // Thông báo cần 
      $message = "Lỗi khi Sửa thể loại";
      // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
      $sql = "UPDATE sanpham SET TenSP = '$this->TenSP', Gia = '$this->Gia', HinhAnh = '$this->HinhAnh', MoTaSP = '$this->MoTaSP',TrangThaiSP = '$this->TrangThaiSP', MaLoaiSP = '$this->MaLoaiSP', SoLuong = '$this->SoLuong'  WHERE MaSP = $this->MaSP";
  
      // thực thi câu truy vấn và kiểm tra kết quả
      if (mysqli_query($conn, $sql)) {
          $message = "Sửa sản phẩm thành công";
      }
       // Chuyển hướng trang và truyền thông báo qua URL
      header("Location: $baseUrl?p=sp&message=" . urlencode($message));
      exit();
  
    }
    //Xóa Sản Phẩm 
    public function XoaSanPham($conn, $baseUrl) {
      // Thông báo cần gửi
      $message = "Lỗi khi Xóa sản phẩm";

      // Chuẩn bị câu truy vấn SQL để xóa loại sản phẩm
      $sql = "DELETE FROM sanpham WHERE MaSP = $this->MaSP";
  
      // thực thi câu truy vấn và kiểm tra kết quả
      if (mysqli_query($conn, $sql)) {
          $message = "Xóa Sản Phẩm Thành Công";
      }
       // Chuyển hướng trang và truyền thông báo qua URL
      header("Location: $baseUrl?p=sp&message=" . urlencode($message));
      exit();
  }

   //Tìm Sản Phẩm
   public function TimSP($conn,$baseUrl) {
    // Thông báo cần 
    $tim = "Tìm Sản Phẩm";
    // Chuẩn bị câu truy vấn SQL để cập nhật thông tin loại sản phẩm
    $sql = "SELECT * FROM sanpham WHERE  TenSP LIKE '%$tim%'";

    // thực thi câu truy vấn và kiểm tra kết quả
    if (mysqli_query($conn, $sql)) {
        $message = "Tìm Thành Công";
    }
     // Chuyển hướng trang và truyền thông báo qua URL
    header("Location: $baseUrl?p=sp&message=" . urlencode($message));
    exit();
  }

    //thêm sản phẩm vào giỏ hàng
    public static function them_gio_hang($SP) {

      // Kiểm tra nếu giỏ hàng không tồn tại, tạo mới giỏ hàng
      if(!isset($_SESSION['GioHang'])) {
          $_SESSION['GioHang'] = array();
      }
      
      // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
      foreach($_SESSION['GioHang'] as $key => $item) {
          if($item['MaSP'] == $SP->MaSP) {
              $_SESSION['GioHang'][$key]['SoLuong']++;  
              return;
          }
      }
      
      // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm vào giỏ hàng
      $_SESSION['GioHang'][] = array(
          'MaSP' => $SP->MaSP,
          'TenSP' => $SP->TenSP,
          'Gia' => $SP->Gia,
          'HinhAnh' => $SP->HinhAnh,
          'SoLuong' => 1
      );
    }


  }

?>
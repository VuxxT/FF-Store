<?php
    include ('../admin/qluser.php');
    include ('../admin/sanpham.php');
    class ddhang {
        public $maddh;
        public $makh;
        public $tenkh;
        public $masp;
        public $tongthanhtien;
        public $trangthaidonhang;




        public static function layDDHang($conn, $id) {
            // Chuẩn bị câu truy vấn SQL để lấy thông tin loại sản phẩm
            $sql = "SELECT * FROM dondathang WHERE MaKH = $id";
        
            // Thực hiện câu truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            // Tạo đối tượng loaisp từ kết quả của câu truy vấn
            $ddh_obj = new ddhang();
            $row = mysqli_fetch_assoc($result);
            $ddh_obj->maddh = $row["MaDDH"];
            $ddh_obj->makh = khachhang :: layDanhSach($conn,$row["MaKH"]);
            $ddh_obj->tenkh = $row["TenKH"];
            $ddh_obj->masp = SanPham :: LayDSSanPham($conn,$row["MaSP"]);
            $ddh_obj->tongthanhtien = $row["TongThanhTien"];
            $ddh_obj->trangthaidonhang = $row["TrangThaiDonDatHang"];
            // Trả về đối tượng loaisp
            return $ddh_obj;
         
        }
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
                $ddh_obj = new ddhang();
                $ddh_obj->maddh = $row["MaDDH"];
                $ddh_obj->makh = $khachhang_obj->MaKH;
                $ddh_obj->tenkh = $row["TenKH"];
                $ddh_obj->masp = $sanpham_obj->TenSP;
                $ddh_obj->tongthanhtien = $row["TongThanhTien"];
                $ddh_obj->trangthaidonhang = $row["TrangThaiDonDatHang"];
                $dondathangList[] = $ddh_obj;
              }
            }
            return $dondathangList;
        }

    }
?>
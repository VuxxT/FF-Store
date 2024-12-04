<?php
  // Gọi hàm laySP để lấy danh sách sản phẩm
  include('../admin/sanpham.php');

  $sanPham = SanPham::laySP($conn,$_GET["id"]);

  ?>
<div class="container">
  <div class="row">
    <div class="chitietspleft"><img src="<?php echo '../admin/uploads/'.$sanPham->HinhAnh; ?>" class="img-responsive" style="width: 100%" alt="Image">
    </div>
    <div class="chitietspright">  
    
       <h1 style = "color: #e5181c;  text-align: center;"> <?php echo $sanPham->TenSP;?> </h1>

      <hr>
      <h3 >Giá: <?php echo number_format($sanPham->Gia); ?> VNĐ </h3>
      <hr>
      <h3>Mô Tả: <?php echo $sanPham->MoTaSP;?></h3>
      <hr>
        <label for="SoLuong" style = "font-size: 2rem;">Số Lượng: <input type="number" name="SL" min="1" max = "10" value = "1"></label>
      <hr> 
        <button style = "font-size: 2.5rem; margin-bottom:15px;"> <a href='<?php echo "$baseUrl?p=themGH&&id=$sanPham->MaSP" ?>'>Thêm Vào Giỏ Hàng</a></button>
          <div class="ctsp-img">
            <img src="../admin/uploads/60mins.png" style = " width: 60px;height: 60px;"> Giao hàng Nhanh trong 60 phút
            <img src="../admin/uploads/freegifts.png" style = " width: 60px;height: 60px; margin-left: 15px;" > Tặng Miễn Phí thiệp hoặc banner
          </div>
    </div>
  </div>
</div>
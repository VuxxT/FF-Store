
<?php
include('../client/connectdb.php');
?>
<div class="" style ="margin-bottom: 50px;width:100%;">
<img src="../admin/uploads/banner.png" alt="">
</div>
<?php
  // Gọi hàm selectSanPham để lấy danh sách sản phẩm
  include ('../admin/sanpham.php');
  $tim=isset($_GET["search"]) ?$_GET["search"]:"";
  $sanPhamList = SanPham::LayDSSanPham($conn,$tim);
  if(count($sanPhamList)>0){
?>

<div class="row">
    <?php
    foreach($sanPhamList as $sanPham) {
    ?>
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="panel panel-info" >
                <div class="panel-heading" style = "background-color: #5bc0de; color: white;"><?php echo $sanPham->TenSP .' --- '. $sanPham->MaLoaiSP?></div>
                <div class="panel-body"><img src="<?php echo '../admin/uploads/'.$sanPham->HinhAnh; ?>"
                        class="img-responsive" style="width: 100%" alt="Image"></div>
                <div class="panel-footer" style="display: flex;justify-content: space-between">
                    <?php echo number_format($sanPham->Gia); ?> VNĐ
                    <a href='<?php echo "$baseUrl?p=spct&&id=$sanPham->MaSP" ?>'>Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
</div>


<?php
  }
  else{
    echo 'Chua co san pham';
  }
?>
 <?php include('phantrang.php');?>


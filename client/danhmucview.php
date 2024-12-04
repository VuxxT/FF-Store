<div class="container">
<?php
include('../client/connectdb.php');
?>
<link rel="stylesheet" href="./asset/style.css">
<div class="" style="margin-bottom: 50px;width:100%;">
    <img src="../admin/uploads/banner.png" alt="">
</div>
<?php

 include ('../admin/sanpham.php');
 $maloaisp = $_GET['id'];
 $sql = "SELECT * FROM sanpham WHERE MaLoaiSP = $maloaisp ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
?>
<div class="row">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="panel panel-info" >
                <div class="panel-heading" style="background-color: #5bc0de; color: white;">
                    <?php echo $row['TenSP']; ?>
                </div>
                <div class="panel-body">
                    <img src="<?php echo '../admin/uploads/'.$row['HinhAnh']; ?>" class="img-responsive"
                        style="width: 100%" alt="Image">
                </div>
                <div class="panel-footer" style="display: flex;justify-content: space-between">
                    <?php echo number_format($row['Gia']); ?> VNĐ
                    <a href="<?php echo "$baseUrl?p=spct&&id=".$row['MaSP']; ?>">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

</div>

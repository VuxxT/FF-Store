<?php
     include ('../client/connectdb.php');
     if(!$_SESSION['email_account']) {
         header("Location:../client/dangnhap.php");
     }


?>


<!--  Giỏ Hàng -->
</div>
    <hr>
    <div class="container">
    <div class="giohang-ttsp">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Hình Ảnh:</th>
                <th scope="col">Tên Sản Phẩm:</th>
                <th scope="col">Thành Tiền:</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php

                    include('../admin/sanpham.php');

                    if(!isset($_SESSION['GioHang'])) {
                        echo "Giỏ hàng của bạn đang trống.";
                        
                        return;
                    }

                    // Bước 2: Hiển thị thông tin giỏ hàng ra cho người dùng
                    $total = 0;
                    foreach($_SESSION['GioHang'] as $item) {
                        $subtotal = $item['Gia'] * $item['SoLuong'];
                        $total += $subtotal;

                ?>
                <tr>
                    <th scope="row"><img src="<?php echo '../admin/uploads/'.$item['HinhAnh']; ?>" class="img-responsive" style="width: 60px; height: 60px;" alt="Image"></th>
                    <td><?php  echo $item['TenSP'] ;?></td>
                    <td><?php echo number_format($subtotal) . " VNĐ<br>"; ?></td>
                    <td></td>
                    <?php
                    }

                    ?>
                    
                </tr>
                
            </tbody>
                    <td></td>
                    <td></td>
                    <td><?php echo "<strong>Tổng tiền: " . number_format($total) . " VNĐ</strong>"?></td>
                <td><button type="button" class="btn btn-success"><a href="<?php echo "$baseUrl?p=thanhtoan&&id" ?>">Xác Nhận Đặt Hàng</a></button></td>

        </table>
    </div>
    </div>
</div>
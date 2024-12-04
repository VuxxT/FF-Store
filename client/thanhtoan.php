<div class="ttnd"> 

	<h2 style = "color:#da667e;">Thông Tin Người Nhận: </h2>
	<label for="" name ="HTNN">Họ Tên Người Nhận: </label>
	<div><input type="text" style = "width: 100%; font-size: 2rem; border-radius: 10px" name ="HTNN"></div>
	<label for="" name ="SDT">Số Điện Thoại: </label>
	<div> <input type="text" style = "width: 100%; font-size: 2rem; border-radius: 10px" name ="SDT"> </div>
	<label for="" name ="DiaChi">Địa Chỉ: </label>
	<div><input type="text" style = "width: 100%; font-size: 2rem; border-radius: 10px" name ="DiaChi"></div>
	<label for="">Ngày Đặt Hàng: <?php echo date("d/m/Y")?></label>
</div>

<h5 style = "color:red;">Bạn Phải Điền Đầy Đủ Thông Tin</h5>
<hr>
<div class="ttsp">
	<h2 style = "color:#da667e;">Thông Tin Sản Phẩm Thanh Toán: </h2>
	</div>
    <hr>
    <div class="giohang-ttsp">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Hình Ảnh:</th>
                <th scope="col">Tên Sản Phẩm:</th>
                <th scope="col">Thành Tiền:</th>
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
                        $idsanpham = $item['MaSP'];
                        $subtotal = $item['Gia'] * $item['SoLuong'];
                        $total += $subtotal;

                ?>
                <tr>
                    <th scope="row"><img src="<?php echo '../admin/uploads/'.$item['HinhAnh']; ?>" class="img-responsive" style="width: 60px; height: 60px;" alt="Image"></th>
                    <td><?php  echo $item['TenSP'] ;?></td>
                    <td><?php echo number_format($subtotal) . " VNĐ<br>"; ?></td>

                    
                    <?php
                    }

                    ?>
                </tr>
				<td><?php echo "<strong>Tổng tiền: " . number_format($total) . " VNĐ</strong>"?></td>
                <td><button type="button" class="btn btn-success" name ="dathang"><a href="<?php echo "$baseUrl?p=dathang" ?>"onclick='alert("Đặt Hàng Thành Công")'>Đặt Hàng</a></button></td>
                    
            </tbody>

        </table>
    </div>
</div>

</div>
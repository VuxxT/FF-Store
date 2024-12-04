<?php  
    include('dondathang.php');
    $data = dondathang::LayDSDDH($conn);


    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<table class="table">
    <thead>
        <tr>
            <th>Mã Đơn Đặt Hàng</th>
            <th>Mã Khách Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Mã Sản Phẩm</th>
            <th>Tổng Thành Tiền</th>
            <th>Trạng Thái Đơn Đặt Hàng</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
            <tr>
                <td scope="row"><?php echo $item->MaDDH;?></td>
                <td><?php echo $item->MaKH;?></td>
                <td><?php echo $item->TenKH;?></td>
                <td><?php echo $item->MaSP;?></td>
                <td><?php echo $item->TongThanhTien;?></td>
                <td><?php echo $item->TrangThaiDonDatHang;?>  </td>
                <td><button type="button" class="btn btn-info"><a href='<?php echo "$baseUrl?p=ordersua&&id=$item->MaDDH" ?>'>Cập Nhật Trạng Thái</a> </button></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php  
    include('../client/laydondathang.php');
    include('../client/connectdb.php');
    $idkhachhang = ddhang::LayDSDDH($conn);



?>

<table class="table">
    <thead>
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tổng Thành Tiền </th>
            <th>Trạng Thái Đơn Đặt Hàng</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($idkhachhang as $item)
            {
        ?>
            <tr>
                <td><?php echo $item->masp;?></td>
                <td><?php echo number_format($item->tongthanhtien);?> VNĐ</td>
                <td><?php echo $item->trangthaidonhang;?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php  
    include('./sanpham.php');
    $data = SanPham::LayDSSanPham($conn);


    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=spth"; ?>">Thêm Sản Phẩm</a>

<table class="table">
    <thead>
        <tr>
            <th>Mã Loại Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá </th>
            <th>Hình Ảnh</th>
            <th>Mô Tả Sản Phẩm</th>
            <th>Trạng Thái Sản Phẩm </th>
            <th>Mã loại </th>
            <th>Số Lượng </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
            <tr>
            <td scope="row"><?php echo $item->MaSP;?></td>
                <td><?php echo $item->TenSP;?></td>
                <td><?php echo $item->Gia ;?></td>
                <td>
                <img src="<?php echo "../admin/uploads/".$item->HinhAnh;?>" style="width: 50px; height: 50px;"/>
                </td>
                <td><?php echo $item->MoTaSP ;?></td>
                <td><?php echo $item->TrangThaiSP;?></td>
                <td><?php echo $item->MaLoaiSP;?></td>
                <td><?php echo $item->SoLuong;?></td>
                <td><a href='<?php echo "$baseUrl?p=spsua&&id=$item->MaSP" ?>'>Sửa</a> | <a href='<?php echo "$baseUrl?p=spxoa&&id=$item->MaSP" ?>'>Xóa</a></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table> 
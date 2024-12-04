<?php  
    include('./danhmuc.php');
    $data = danhmuc::layDanhSach($conn);


    if (isset($_GET["message"])) {
        $message = $_GET["message"];
?>
        <span class="badge badge-primary">
            <?php echo $message ?>
        </span>
<?php
    }
?>

<a class="btn btn-primary btn-lg" href="<?php echo " $baseUrl?p=danhmucth"; ?>">Thêm Danh Mục</a>

<table class="table">
    <thead>
        <tr>
            <th>Mã Loại Sản Phẩm</th>
            <th>Tên Loại Sản Phẩm </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
            <tr>
                <td scope="row"><?php echo $item->MaLoaiSP ;?></td>
                <td><?php echo $item->TenLoaiSP;?></td>
                <td><a href='<?php echo "$baseUrl?p=danhmucsua&&id=$item->MaLoaiSP" ?>'>Sửa</a> | <a href='<?php echo "$baseUrl?p=danhmucxoa&&id=$item->MaLoaiSP" ?>'>Xóa</a></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
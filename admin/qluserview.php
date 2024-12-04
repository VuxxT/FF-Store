<?php  
    include('./qluser.php');
    $data = khachhang::layDanhSach($conn);


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
            <th>Mã Khách Hàng</th>
            <th>Họ Tên Khách Hàng </th>
            <th>Giới Tính </th>
            <th>Địa Chỉ </th>
            <th>Số Điện Thoại </th>
            <th>Email </th>
            <th>Ngày Sinh </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $item)
            {
        ?>
            <tr>
                <td scope="row"><?php echo $item->MaKH ;?></td>
                <td><?php echo $item->HoTenKH;?></td>
                <td><?php echo $item->GioiTinh ;?></td>
                <td><?php echo $item->DiaChi ;?></td>
                <td><?php echo $item->SDT ;?></td>
                <td><?php echo $item->Email ;?></td>
                <td><?php echo $item->NgaySinh ;?></td>
                
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
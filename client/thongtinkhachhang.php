<?php
    include ('../client/laythongtinkhachhang.php');

    if(isset($_POST["Email"])){
        $data = new khachhang();
        $data->MaKH = $_POST["MaKH"];
        $data->HoTenKH = $_POST["HoTenKH"];
        $data->GioiTinh = $_POST["GioiTinh"];
        $data->DiaChi = $_POST["DiaChi"];
        $data->SDT = $_POST["SDT"];
        $data->Email = $_POST["Email"];
        $data->NgaySinh = $_POST["NgaySinh"];
        $data->SuaKhachHang($conn,$baseUrl);
    }else{
        $id = ($_GET["id"]);
        $data = new khachhang();
        $data  =  $data->laykhachhang($conn,$id);
    }   
?>


<form method="post">
    <div class="form-group">
        <label for="makh">Mã Khách Hàng: </label>
        <input type="text" class="form-control" id="MaKH" name="MaKH" value ='<?php echo $data->MaKH ;?>'>
    </div>
    <div class="form-group">
        <label for="hotenkhachhang">Họ Tên Khách Hàng: </label>
        <input type="text" class="form-control" id="HoTenKH" name="HoTenKH" value ='<?php echo $data->HoTenKH ;?>'>
    </div>
    <div class="form-group">
        <label for="gioitinh">Giới Tính: </label>
        <input type="text" class="form-control" id="GioiTinh" name="GioiTinh" value ='<?php echo $data->GioiTinh ;?>'>
    </div>
    <div class="form-group">
        <label for="diachi">Địa Chỉ: </label>
        <input type="text" class="form-control" id="DiaChi" name="DiaChi" value ='<?php echo $data->DiaChi ;?>'>
    </div>
    <div class="form-group">
        <label for="sodienthoai">Số Điện Thoại: </label>
        <input type="text" class="form-control" id="SDT" name="SDT" value ='<?php echo $data->SDT; ?>'>
    </div>
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="text" class="form-control" id="Email" name="Email" value ='<?php echo $data->Email ;?>'>
    </div>
    <div class="form-group">
        <label for="ngaysinh">Ngày Sinh : </label>
        <input type="text" class="form-control" id="NgaySinh" name="NgaySinh" value ='<?php echo $data->NgaySinh ;?>'>
    </div>
    
    <div class="form-group">
        <input type="submit" class="form-control" value="Thay Đổi Thông Tin khách hàng"/>
    </div>
</form>
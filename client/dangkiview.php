<?php
    if(isset($_POST["HoTenKH"])){
        include('../client/dangki.php');
        $data = new DKKhachHang();
        $data->HoTenKH = $_POST["HoTenKH"];
        $data->GioiTinh = $_POST["GioiTinh"];
        $data->DiaChi = $_POST["DiaChi"];
        $data->SDT = $_POST["SDT"];
        $data->Email = $_POST["Email"];
        $data->NgaySinh = $_POST["NgaySinh"];
        $data->MatKhau = $_POST["MatKhau"];
        $data->ThemKH($conn,$baseUrl);
        
    }
?>


<!-- Khi Khách Hàng Đăng Ký Thành Công DB Sẽ Tự Cập Nhật -->

<form method="post">
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Họ Tên Khách Hàng: </label>
        <input type="text" class="form-control" id="HoTenKH" name="HoTenKH">
    </div>
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Giới Tính: </label>
        <input type="text" class="form-control" id="GioiTinh" name="GioiTinh">
    </div>
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Địa Chỉ: </label>
        <input type="text" class="form-control" id="DiaChi" name="DiaChi">
    </div>
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Số Điện Thoại: </label>
        <input type="text" class="form-control" id="SDT" name="SDT">
    </div>
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Email: </label>
        <input type="email" class="form-control" id="Email" name="Email" >
    </div>
    <!--  -->
    <div class="form-group">
        <label for="HoTenKH">Ngày Sinh : </label>
        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" >
    </div>

    <div class="form-group">
        <label for="HoTenKH">Mật Khẩu : </label>
        <input type="text" class="form-control" id="MatKhau" name="MatKhau" >
    </div>
<!-- Gửi Yêu Cầu -->
    <div class="form-group">
        <input type="submit" class="form-control" value="Đăng Ký"/>
    </div>
</form>

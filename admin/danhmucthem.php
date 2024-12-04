<?php
    if(isset($_POST["TenLoaiSP"])){
        include('./danhmuc.php');
        $data = new danhmuc();
        $data->TenLoaiSP = $_POST["TenLoaiSP"];
        $data->ThemDanhMucSP($conn,$baseUrl);
    }
?>

<form method="post">
   
    <div class="form-group">
        <label for="Tenloaisp">Tên Loại Sản Phẩm:</label>
        <input type="text" class="form-control" id="TenLoaiSP" name="TenLoaiSP">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Them danh muc"/>
    </div>
</form>

<?php
    include('./sanpham.php');
    if(isset($_POST["TenSP"])){
        $data = new SanPham();
        $data->MaSP = $_POST["MaSP"];
        $data->TenSP = $_POST["TenSP"];
        $data->Gia = $_POST["Gia"];
        $data->HinhAnh = $_POST["HinhAnh"];
        $data->MoTaSP = $_POST["MoTaSP"];
        $data->TrangThaiSP = $_POST["TrangThaiSP"];
        $data->MaLoaiSP = $_POST["MaLoaiSP"];
        $data->SoLuong=$_POST["SoLuong"];
        $data->SuaSP($conn,$baseUrl);
    }else{
        $id = ($_GET["id"]);
        $data = new SanPham();
        $data  =  $data->laySP($conn,$id);
    }
?>


<form method="post">
    <div class="form-group">
        <label for="MaSP">Mã Sản Phẩm: </label>
        <input type="text" class="form-control" id="MaSP" name="MaSP" value ='<?php echo $data->MaSP ;?>'>
    </div>

    <div class="form-group">
        <label for="TenSP">Tên Sản Phẩm: </label>
        <input type="text" class="form-control" id="TenSP" name="TenSP" value ='<?php echo $data->TenSP ;?>'>
    </div>

    <div class="form-group">
        <label for="Gia">Giá Sản Phẩm: </label>
        <input type="text" class="form-control" id="Gia" name="Gia" value ='<?php echo $data->Gia ;?>'>
    </div>

    <div class="form-group">
        <label for="HinhAnh">Hình Ảnh: </label>
        <input type="file" class="form-control" id="HinhAnh" name="HinhAnh" value ='<?php echo $data->HinhAnh ;?>'>
    </div>

    <div class="form-group">
        <label for="MoTaSP">Mô Tả Sản Phẩm: </label>
        <input type="text" class="form-control" id="MoTaSP" name="MoTaSP" value ='<?php echo $data->MoTaSP; ?>'>
    </div>

    <div class="form-group">
        <label for="TrangThaiSP">Trạng Thái Sản Phẩm: </label>
        <input type="text" class="form-control" id="TrangThaiSP" name="TrangThaiSP" value ='<?php echo $data->TrangThaiSP ;?>'>
    </div>

    <div class="form-group">
        <label for="MaLoaiSP">Mã Loại Sản Phẩm: </label>
        <input type="text" class="form-control" id="MaLoaiSP" name="MaLoaiSP" value ='<?php echo $data->MaLoaiSP->MaLoaiSP;?>'>
    </div>

    <div class="form-group">
        <label for="SoLuong">Số Lượng: </label>
        <input type="text" class="form-control" id="SoLuong" name="SoLuong" value ='<?php echo $data->SoLuong ;?>'>
    </div>
    
    <div class="form-group">
        <input type="submit" class="form-control" value="Sửa Sản Phẩm "/>
    </div>
</form>
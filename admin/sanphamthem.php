
<?php
    if(isset($_POST["TenSP"])){
        include('./sanpham.php');
        $data = new SanPham();
        $uploadResult = $data->uploadImage($_FILES["file"], "uploads/");
        $data->TenSP = $_POST["TenSP"];
        $data->Gia = $_POST["Gia"];
        $data->HinhAnh = "".basename($_FILES["file"]["name"]);
        $data->MoTaSP = $_POST["MoTaSP"];
        $data->TrangThaiSP = $_POST["TrangThaiSP"];
        $data->MaLoaiSP = $_POST["Ldanhmuc"];
        $data->SoLuong = $_POST["SoLuong"];
        
        if(!$data->TenSP || !$data->Gia|| !$data->HinhAnh || !$data->MoTaSP || !$data->TrangThaiSP || !$data->MaLoaiSP || !$data->SoLuong){ 
            echo "Vui Lòng Nhập Đầy Đủ Thông Tin.";

        }else{
            $data->ThemSP($conn,$baseUrl);
        }
   
    
    }
?>
<?php
    include('./danhmuc.php');
    $Ldanhmuc = danhmuc::layDanhSach($conn);

?>

<form method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="TenSP">Tên Sản Phẩm: </label>
        <input type="text" class="form-control" id="TenSP" name="TenSP">
    </div>

    <div class="form-group">
        <label for="Gia">Giá: </label>
        <input type="text" class="form-control" id="Gia" name="Gia">
    </div>

    <div class="form-group">
        <label for="HinhAnh">Hình Ảnh: </label>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    
    <div class="form-group">
        <label for="MoTaSP">Mô Tả Sản Phảm: </label>
        <input type="text" class="form-control" id="MoTaSP" name="MoTaSP">
    </div>

    <div class="form-group">
        <label for="TrangThaiSP">Trạng Thái Sản Phảm: </label>
        <input type="text" class="form-control" id="TrangThaiSP" name="TrangThaiSP">
    </div>

    <!-- <div class="form-group">
        <label for="MaLoaiSP">Mã loại : </label>
        <input type="text" class="form-control" id="MaLoaiSP" name="MaLoaiSP">
    </div> -->

    <div>
        <select  name="Ldanhmuc" id="Ldanhmuc" >
       <option value=" ">Tên Loại Sản Phẩm:  </option>
        <?php
        foreach($Ldanhmuc as $L ){
        
        ?>
       <option value="<?php echo $L->MaLoaiSP ;?>"><?php echo $L->TenLoaiSP ;?></option>

       <?php
        }
       ?>
     </select>
    </div>

    <div class="form-group">
        <label for="SoLuong">Số Lượng: </label>
        <input type="text" class="form-control" id="SoLuong" name="SoLuong">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Thêm Sản Phẩm"/>
    </div>
</form>
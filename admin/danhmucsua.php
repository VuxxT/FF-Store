<?php
    include('./danhmuc.php');
    if(isset($_POST["TenLoaiSP"])){
        $data = new danhmuc();
        $data->MaLoaiSP = $_POST["MaLoaiSP"];
        $data->TenLoaiSP = $_POST["TenLoaiSP"];
        $data->SuaDanhmucSP($conn,$baseUrl);
    }else{
        $id = ($_GET["id"]);
        $data = new danhmuc();
        $data  =  $data->layDanhmucSP($conn,$id);
    }
?>

<form method="post">
    <div class="form-group">
        <label for="theloai_ten">Mã Loại Sản Phẩm: </label>
        <input type="text" class="form-control" id="MaLoaiSP" name="MaLoaiSP" value ='<?php echo $data->MaLoaiSP ;?>'>
    </div>
    <div class="form-group">
        <label for="theloai_ten">Tên Loại Sản Phẩm: </label>
        <input type="text" class="form-control" id="Tenloaisp" name="TenLoaiSP" value ='<?php echo $data->TenLoaiSP ;?>'>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Sửa Thể Loại"/>
    </div>
</form>
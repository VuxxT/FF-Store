<?php
    include('dondathang.php');
    if(isset($_POST["TenKH"])){
        $data = new dondathang();
        $data->MaDDH = $_POST["MaDDH"];
        $data->TrangThaiDonDatHang = $_POST["TrangThaiDonDatHang"];
        $data->MaSP = $sanpham_obj->MaSP;
        $data->SuaDDH($conn,$baseUrl);
    }else{
        $id = ($_GET["id"]);
        $data = new dondathang();
        $data  =  $data->layDDH($conn,$id);
    }

    
?>

<form method="post">
    <div class="form-group">
        <label for="MaDDH">Mã Đơn Đặt Hàng: </label>
        <input type="text" class="form-control" id="MaDDH" name="MaDDH" value ='<?php echo $data->MaDDH ;?>'>
    </div>

 

    <div class="form-group">
        <label for="TenKH">Tên Khách Hàng: </label>
        <input type="text" class="form-control" id="TenKH" name="TenKH" value ='<?php echo $data->TenKH ;?>'>
    </div>


    <div class="form-group">
        <label for="TongThanhTien">Tổng Thành Tiền: </label>
        <input type="text" class="form-control" id="TongThanhTien" name="TongThanhTien" value ='<?php echo $data->TongThanhTien; ?>'>
    </div>

    <div class="form-group">
        <label >Trang Thái Đơn Hàng: </label>
        <select name="TrangThaiDonDatHang" id="TrangThaiDonDatHang">
            <option value="1">Đang xử lý</option>
            <option value="Giao Thành Công" >Giao Thành Công</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value=" Cập Nhật Đơn Đặt Hàng "/>
    </div>
</form>
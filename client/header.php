<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="https://vi-vn.facebook.com/" class="facebook"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://twitter.com/?lang=vi" class="twitter"><i class="fa-brands fa-square-twitter"></i></a>
                <a href="https://www.instagram.com/" class="instagram"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
            <div class="col-sm-6">
                <a href="index.php"><img src="../admin/uploads/fee.png" style="width: 500px;height: 100px;"></a>
            </div>
            <div class="col-sm-3">
                <div class="acc-cart">
                        <?php 
                            if(isset($_SESSION['email_account'])&&($_SESSION['email_account'] != "")){
                                $id = $_SESSION['email_account'];
                                $idkhachhang = $_SESSION['Ma_khachhang'];
                        
                                
                        ?>
                        <div class="acc-thoat">
                            <li class="account-ok"><a href="<?php echo "$baseUrl?p=ttkh&&id=$id"?>" style = "display:flex;"><span class="glyphicon glyphicon-user" style = "margin-right:5px;"></span><?php echo $_SESSION['email_account']?></a></li>
                            <li class="thoat"><button type="button" class="btn btn-info"><a href="<?php echo "$baseUrl?p=ctdondathang&&id=$idkhachhang"?>">Chi Tiết Đơn Đặt Hàng</a></button></li>
                            <li class="thoat"><button type="button" class="btn btn-info"><a href="<?php echo "$baseUrl?p=thoat"?>">Đăng Xuất</a></button></li>
                            
                        </div>
                        <?php        
                            }
                            
                            else{
                        
                        ?>
                    <li class="account"><a href="../admin/dangnhap.php"><span class="glyphicon glyphicon-user"></span>
                            Tài Khoản</a>
                        <div class="account-login">
                            <div class="dangnhap"><a href="<?php echo ('dangnhap.php') ?>"><button type="button"
                                        class="btn btn-info">Đăng Nhập</button></a></div>
                            <div class="dangky"><button type="button"
                                        class="btn btn-info"><a href='<?php echo "$baseUrl?p=dktk" ?>'>Đăng Kí</a></button></div>
                        </div>
                    <?php
                        }
                    ?>    
                    </li>
                    <a href="<?php echo "$baseUrl?p=giohang" ?>" class="cart"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ
                        Hàng</a>
                </div>
            </div>
        </div>
    </div>
    <div class="seach">
        <form action="" method="get">
            <input type="text" name = "search" placeholder = "Nhập Hoa Cần Tìm" value = "" style = "border-radius: 7px;width: 75%;">
            <input type="submit" value="Tìm Kiếm" style = "border-radius: 7px;">
        </form>
    </div>

</div>
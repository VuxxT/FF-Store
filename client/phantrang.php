<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php 
                
        $conn = mysqli_connect('localhost', 'root', '', 'ffstore');
        
        //  TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(MaSP) as total from sanpham');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        
    
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
        
      
        $total_page = ceil($total_records / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        
        
        $result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
        ?>
        <div>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #5bc0de; color: white;">
                        <?php echo $row['TenSP']; ?>
                    </div>
                    <div class="panel-body">
                        <img src="<?php echo '../admin/uploads/'.$row['HinhAnh']; ?>" class="img-responsive"
                            style="width: 100%" alt="Image">
                    </div>
                    <div class="panel-footer" style="display: flex;justify-content: space-between">
                        <?php echo number_format($row['Gia']); ?> VNĐ
                        <a href="<?php echo "$baseUrl?p=spct&&id=".$row['MaSP']; ?>">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        </div>
        <div class="pagination" >
           <?php 
           
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
            }
            
 
            for ($i = 1; $i <= $total_page; $i++){
            
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
            }
                    ?>
        </div>
    </body>
</html>
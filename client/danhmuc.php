<?php 
    include("../client/connectdb.php");
    $sql = "SELECT * FROM danhmuc";
    $result = mysqli_query($conn, $sql);
    /* $rows = mysqli_fetch_assoc($result); */
?>

<div class="container">
    <div class="danhmuc">
        <a href="index.php"><button type="button" class="btn btn-info">Trang Chủ</button></a>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php $idmaloaisp = $row['MaLoaiSP'] ?>
            <a href="<?php  echo "$baseUrl?p=danhmuc&&id= $idmaloaisp" ?>">
            <button type="button" class="btn btn-info"><?php echo $row['TenLoaiSP']; ?></button>
            </a>
        <?php endwhile; ?>

    </div>
</div>
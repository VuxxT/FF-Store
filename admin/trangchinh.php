<?php
include('../client/connectdb.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo $_SESSION['email_account'];
/* if(!$_SESSION['email_account']) {
    header("Location: ../client/dangnhap.php");
} */
?>
<h1>Trang chủ admin</h1>
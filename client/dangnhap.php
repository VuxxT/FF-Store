<?php
include('../client/connectdb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php
                                    if (session_status() === PHP_SESSION_NONE) {
                                        session_start();
                                    }
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["form_login"])) {
                                        $user_name = $_POST['user_name'];
                                        $user_pass = $_POST['user_pass'];

                                        $result = mysqli_query($conn, "SELECT * from khachhang where Email='$user_name' and MatKhau='$user_pass'");
                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            if (isset($row['Email'])) {
                                               $_SESSION['email_account'] = $row['Email'];
                                               $_SESSION['Ma_khachhang']= $row['MaKH'];
                                               $_SESSION['Ten_khachhang']= $row['HoTenKH'];
                                            }
                                            if (isset($_SESSION['email_account']) && $_SESSION['email_account'] === "admin@gmail.com") {
                                                echo "admin";
                                                header("Location: ../admin/index.php");
                                                exit();
                                            } else {
                                                echo "client";
                                                header("Location: index.php");
                                                exit();
                                            }
                                        } else {
                                            echo "Đăng nhập không thành công!";
                                        }
                                    }
                                    ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                                    </div>
                                    <form class="user" action="dangnhap.php" method="POST">
                                        <input type="hidden" name="form_login" value="true">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." name="user_name">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="user_pass">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</body>

</html>
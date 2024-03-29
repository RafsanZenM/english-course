<?php 
    session_start();
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>English Course</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/logo.png">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang Admin !</h1>
                            </div>
                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                </div>
                                <button href="index.php" class="btn btn-primary btn-user btn-block" name="login">
                                    Login
                                </button>
                            </form>

                            <!-- Sistem Login -->
                            <?php 
                                if (isset($_POST['login'])) {
                                    $sql = $conn->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
                                    $match = $sql->num_rows;
                                    if($match == 1) {
                                        $_SESSION['admin']=$sql->fetch_assoc();
                                        echo "<div class='alert alert-info mt-3 text-center'>Login Sukses</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                    } else {
                                        echo "<div class='alert alert-danger mt-3 text-center'>Username atau Password Salah !</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
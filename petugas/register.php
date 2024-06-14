<?php
include '../koneksi.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi Petugas </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="post">

                            <div class="text-center">
                                <img src="assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group <?php if (isset($_GET['error_nama'])) echo 'has-danger'; ?>">
                                    <input type="text" name="nama_petugas" class="form-control <?php if (isset($_GET['error_nama'])) echo 'form-control-danger mt-3'; ?>" placeholder="Masukkan Nama Lengkap Anda">
                                    <?php if (isset($_GET['error_nama'])) : ?>
                                        <div class="col-sm-12 text-danger" style="color: red; font-size: 12px; margin-top: 5px; margin-left: -120px;"> <!-- Ubah div ini agar pesan error ditampilkan dengan warna merah dan gaya yang sesuai -->
                                            <span class="md-line"></span><?php echo $_GET['error_nama']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group <?php if (isset($_GET['error_un'])) echo 'has-danger'; ?>">
                                    <input type="text" name="username" class="form-control <?php if (isset($_GET['error_un'])) echo 'form-control-danger mt-3'; ?>" placeholder="Masukkan Username Anda">
                                    <?php if (isset($_GET['error_un'])) : ?>
                                        <div class="col-sm-12 text-danger" style="color: red; font-size: 12px; margin-top: 5px; margin-left: -120px;"> <!-- Ubah div ini agar pesan error ditampilkan dengan warna merah dan gaya yang sesuai -->
                                            <span class="md-line"></span><?php echo $_GET['error_un']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group <?php if (isset($_GET['error_pw'])) echo 'has-danger'; ?>">
                                    <input type="password" name="password" class="form-control <?php if (isset($_GET['error_pw'])) echo 'form-control-danger mt-3'; ?>" placeholder="Masukkan Password Anda">
                                    <?php if (isset($_GET['error_pw'])) : ?>
                                        <div class="col-sm-12 text-danger" style="color: red; font-size: 12px; margin-top: 5px; margin-left: -120px;"> <!-- Ubah div ini agar pesan error ditampilkan dengan warna merah dan gaya yang sesuai -->
                                            <span class="md-line"></span><?php echo $_GET['error_pw']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group <?php if (isset($_GET['error_telp'])) echo 'has-danger'; ?>">
                                    <input type="text" name="telp" class="form-control <?php if (isset($_GET['error_telp'])) echo 'form-control-danger mt-3'; ?>" placeholder="Masukkan No. Telp Anda">
                                    <?php if (isset($_GET['error_telp'])) : ?>
                                        <div class="col-sm-12 text-danger" style="color: red; font-size: 12px; margin-top: 5px; margin-left: -120px;"> <!-- Ubah div ini agar pesan error ditampilkan dengan warna merah dan gaya yang sesuai -->
                                            <span class="md-line"></span><?php echo $_GET['error_telp']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="register" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                                    </div>
                                </div>

                            </div>
                            <hr />
                    </div>
                    </form>



                    <!--if (isset($_POST['loginadmin'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $query = "SELECT*FROM petugas WHERE username='$username' AND level='admin'";
                            $sql = mysqli_query($koneksi, $query);
                            $data = mysqli_fetch_array($sql);
                            if (mysqli_num_rows($sql) >= 1) {
                                if ($password == $data['password']) {
                                    session_start();
                                    $_SESSION['username'] = $data['username'];
                                    $_SESSION['admin'] = $data;
                                    header("location:index.php");
                                } else {
                                    header("location:login.php?pesan=Password Salah");
                                }
                            } else {
                                header("location:login.php?pesan=Username Salah");
                            }
                        }
                        ?>-->
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <?php
    if (isset($_POST['register'])) {
        $nama = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $telp = $_POST['telp'];
        $level = 'petugas';
        // Validasi input
        if (empty($_POST['nama_petugas'])) {
            header("location:register.php?error_nama=Nama Petugas wajib diisi");
        } else if (empty($_POST['username'])) {
            header("location:register.php?error_un=Username wajib diisi");
        } else if (empty($_POST['password'])) {
            header("location:register.php?error_pw=password wajib diisi");
        } else if (empty($_POST['telp'])) {
            header("location:register.php?erro_telp=No telp wajib diisi");
        } else {
            // Jika semua input valid, lakukan penyimpanan ke database
            $query = "INSERT INTO petugas(nama_petugas,username,password,telp,level) VALUES ('$nama','$username','$password','$telp','$level')";
            $sql = mysqli_query($koneksi, $query);
            if ($sql) {
                // Jika penyimpanan berhasil, arahkan ke halaman login
                echo '<script>
                                Swal.fire({
                                    title: "Register Berhasil!",
                                    text: "Anda akan dialihkan ke halaman Login.",
                                    icon: "success",
                                    willClose: () => {
                                        window.location.href = "login.php";
                                    }
                                });
                              </script>';

                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi); // Tampilkan pesan error jika terjadi kesalahan pada kueri SQL
                exit();
            }
        }
    }
    ?>
</body>

</html>
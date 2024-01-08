<?php
// session_start();
if (isset($_SESSION["id"])) {
    switch ($_SESSION["role"]) {
        case "1":
            header("Location: ?controller=quan_li");
            break;

        case "2":
            header("Location: ?controller=dau_bep");
            break;

        case "3":
            header("Location: ?controller=nhan_vien");
            break;

        case "4":
            header("Location: ?controller=phuc_vu");
            break;
        default:
            header("Location: ?error=Bạn cần đăng nhập!!!");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET["error"])) {
    $error = $_GET["error"];
    echo "<script type='text/javascript'>alert('$error');</script>";
}
?>

<head>
    <meta charset="utf-8" />
    <title>Vai trò đăng nhập - Kitchen Pro++</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="view/assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="view/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="view/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="view/assets/css/style.css" rel="stylesheet" />

</head>

<body>
    <h2 class="display-5 text-black animated pt-4" style="text-align: center;">
        Lựa chọn vai trò đăng nhập
    </h2>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="?controller=dang_nhap&role=3">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <center>
                                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                </center>
                                <h5 style="text-align: center;">Khách Hàng</h5>
                                <!-- <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="?controller=dang_nhap&role=1">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <center>
                                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                </center>
                                <h5 style="text-align: center;">Quản Lí</h5>
                                <!-- <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="?controller=dang_nhap&role=2">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <center>
                                    <i class="fa fa-3x fa-solid fa-kitchen-set text-primary mb-4"></i>
                                </center>
                                <h5 style="text-align: center;">Đầu Bếp</h5>
                                <!-- <p>
                                Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                                amet diam
                            </p> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a href="?controller=dang_nhap&role=4">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <center>
                                    <i class="fa fa-3x fa-solid fa-people-roof text-primary mb-4"></i>
                                </center>
                                <h5 style="text-align: center;">Phục Vụ</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0" style="position:absolute;
        bottom:0;  ">
            &copy; <a class="border-bottom" href="#">Kitchen Pro++</a> All
            Right Reserved.
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="view/assets/lib/wow/wow.min.js"></script>
    <script src="view/assets/lib/easing/easing.min.js"></script>
    <script src="view/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="view/assets/lib/counterup/counterup.min.js"></script>
    <script src="view/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="view/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="view/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="view/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="view/assets/js/main.js"></script>
</body>

</html>
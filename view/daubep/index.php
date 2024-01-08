<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 2) {
    header("Location: ?controller=dang_nhap&role=2");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kitchen Pro ++</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="view/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="view/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="view/assets/css/style.css" rel="stylesheet">
    <style>
        .th {
            font-size: 12px;
            color: #fff;
            line-height: 1.4;
            text-transform: uppercase;
            background-color: #36304a;
        },
        table, th, td {
             border: 1px solid black;
        },
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #36304a;
            color: white;
        }
        
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">
                        <i class="fa fa-utensils me-3"></i>Kitchen Pro++
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="?controller=nhan_vien" class="nav-item nav-link active">Trang Chủ</a>
                        <!-- <a href="about.html" class="nav-item nav-link">About</a>  -->
                        <!--<a href="?controller=nhan_vien&action=datmon&role=3" class="nav-item nav-link">Đặt Món</a>-->
                        <!--<a href="?controller=dexuatmonan&role=3" class="nav-item nav-link">Đề Xuất Món Ăn</a>-->
                        <!-- <a href="?controller=nhan_vien&role=3&action=invoice" class="nav-item nav-link">Hóa Đơn</a> -->
                        <!--<a href="?controller=nhan_vien&action=vieworder" class="nav-item nav-link">Đơn Hàng</a>-->
                        <!--<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản Lý Người Dùng</a>
                            <div class="dropdown-menu m-0">
                                <a href="#" class="dropdown-item">Thêm nhân viên</a>
                                <a href="#" class="dropdown-item">Thêm nhân viên theo danh sách</a>
                            </div>
                        </div> -->
                        <a href="
                        <?php if (isset($_SESSION["role"])) {
                            echo "?controller=dang_xuat&role=" . $_SESSION["role"];
                        } ?>
                        " class="nav-item nav-link">Đăng Xuất</a>
                    </div>
                    <!-- <a href="?controller=datmon&role=3" class="btn btn-primary py-2 px-4">Đặt Món Ngay</a> -->
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Tận Hưởng<br>Bữa Ăn Tuyệt Vời</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Hãy ghé thăm trang web của chúng tôi ngay hôm nay để khám phá thêm về các món ăn hấp dẫn 
                            và đặt hàng để thưởng thức những hương vị tuyệt vời từ công ty chúng tôi.</p>
                            <a href="?controller=nhan_vien&action=datmon&role=3" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Đặt Món Ngay</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="view/assets/img/hero2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
    <!-- Content Start -->    
    <h3 style="text-align: center; color: #FEA116;">Món Ăn Cần Nấu Trong Ngày</h5>
    <p style="text-align: center;">Hôm nay: <?php echo date("d-m-Y"); ?></p>
    <table id="customers" style="width: 100%">
        <tr>
            <th style="text-align: center;">Tên Món Ăn</th>
            <th>Số Lượng</th>
        </tr>
    <?php foreach ($arr as $each) { ?>
        <tr>
        <td style="text-align: center;"><?php echo $each["TenMonAn"] ?></td>
        <td ><?php echo $each["SoLuong"] ?></td>
        </tr>
    <?php } ?>
</table>
    <!-- Content End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Reservation</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                    <h5 class="text-light fw-normal">Monday - Saturday</h5>
                    <p>09AM - 09PM</p>
                    <h5 class="text-light fw-normal">Sunday</h5>
                    <p>10AM - 08PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Kitchen Pro++</a> All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
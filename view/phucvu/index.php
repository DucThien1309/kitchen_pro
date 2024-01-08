<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 4) {
    header("Location: ?controller=dang_nhap&role=1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Kitchen Pro++</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="view/assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="view/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="view/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="view/assets/css/style.css" rel="stylesheet" />

    <style>
        .hero-header {
            height: 0px;
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
    <div class="container-xxl py-5">
        <div class="container">
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
                                <a href="?controller=phuc_vu" class="nav-item nav-link active">Trang chủ</a>
                                 <a href="#" class="nav-item nav-link">Thông tin cá nhân</a> 
                                <!--<a href="service.html" class="nav-item nav-link">Service</a>-->
                                <!-- <a href="?controller=quan_li&action=view_thucdon&role=1" class="nav-item nav-link">Quản Lý Thực Đơn</a> -->
                                <!-- <a href="?controller=nguyen-lieu&role=1" class="nav-item nav-link">Quản Lý
                                    Nguyên
                                    Liệu</a> -->
                                <!--Nguyên liệu-->
                                <!--<div class="nav-item dropdown">-->
                                <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản Lý Nguyên Liệu</a>-->
                                <!--    <div class="dropdown-menu m-0">-->
                                <!--    <a href="?controller=nguyen-lieu&role=1" class="dropdown-item">Quản lý nguyên liệu</a>-->
                                <!--    <a href="?controller=nguyen-lieu&action=thanh-phan-mon-an&role=1" class="dropdown-item">Nguyên liệu món ăn</a>-->
                                <!--    <a href="?controller=nguyen-lieu&action=danh-sach-can-mua" class="dropdown-item">Nguyên liệu cần mua</a>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--Hết Nguyên Liệu-->
                                <!--Món ăn-->
                                <!--<div class="nav-item dropdown">-->
                                <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản Lý Món Ăn</a>-->
                                <!--    <div class="dropdown-menu m-0">-->
                                <!--        <a href="?controller=mon-an&role=1" class="dropdown-item">Xem bảng quản lí món ăn</a>-->
                                <!--        <a href="?controller=xemthongkemonan&role=1" class="dropdown-item">Xem thống kê món ăn</a>-->
                                <!--        <a href="?controller=xemdexuatmonan&role=1" class="dropdown-item">Xem đề xuất món ăn</a>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--Hết món ăn-->
                                <!--<div class="nav-item dropdown">-->
                                <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản-->
                                <!--        Lý-->
                                <!--        Người-->
                                <!--        Dùng</a>-->
                                <!--    <div class="dropdown-menu m-0">-->
                                <!--        <a href="?controller=dang_ky&role=1" class="dropdown-item">Thêm nhân-->
                                <!--            viên</a>-->
                                <!--        <a href="?controller=dang_ky_theo_ds&role=1" class="dropdown-item">Thêm-->
                                <!--            nhân-->
                                <!--            viên theo-->
                                <!--            danh sách</a>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <a href="
                        <?php if (isset($_SESSION["role"])) {
                            echo "?controller=dang_xuat&role=" . $_SESSION["role"];
                        } ?>
                        " class="nav-item nav-link">Đăng Xuất</a>
                            </div>
                            <!-- <a href="" class="btn btn-primary py-2 px-4">Book A Table</a> -->
                        </div>
                    </nav>

                    <div class="container-xxl py-5 bg-dark hero-header mb-5">
                        <div class="container my-5 py-5">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6 text-center text-lg-start">

                                </div>
                                <div class="col-lg-6 text-center text-lg-end overflow-hidden">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Danh Sách Nhận Món</h5>
        <!-- <h1 class="mb-5">Most Popular Items</h1> -->
    </div>
    <p style="text-align: center;">Hôm nay: <?php echo date("d-m-Y"); ?></p>
    <!--<h1>Danh sách</h1>-->
    <?php 
        // print_r($arr); 
    ?>
    <table id="customers" style="width: 100%">
        <tr>
            <th>Mã nhân viên</th>
            <th>Họ Tên</th>
            <th>Tên Món Ăn</th>
            <th>Số Lượng</th>
            <th>Hành động</th>
        </tr>
    <?php 
    if($arr == null){
        // echo "null";
    }
    else{
        foreach ($arr as $each) { 
        echo '<tr>';
            echo '<td>' .$each["MaNhanVien"] .'</td>'
            .'<td>' .$each["HoTen"] .'</td>'
            .'<td>' .$each["TenMonAn"] .'</td>'
            .'<td>' .$each["TongSoLuong"] .'</td>'
            .'<td>'
                .'<a href="?controller=phuc_vu&action=xac_nhan&id=' 
                .$each["MaNhanVien"] .'">Xác nhận giao món</a>
            </td>
        </tr>';
        }
    }
    ?>
    </table>
</body>

</html>

<script>
    // Function to preview image and save it to localStorage
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
            localStorage.setItem('imagePreview', reader.result); // Save image to localStorage
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    // Check if there is a saved image in localStorage and display it when the page loads
    window.onload = function() {
        var savedImage = localStorage.getItem('imagePreview');
        var preview = document.getElementById('image-preview');
        if (savedImage) {
            preview.src = savedImage;
        }
        // Save the initial image to localStorage if it hasn't been saved yet
        else if (preview.src.includes('IMG/')) {
            localStorage.setItem('imagePreview', preview.src);
        }
    };

    // Save the current image to localStorage before submitting the form
    document.querySelector('.form').addEventListener('submit', function() {
        var currentImage = document.getElementById('image-preview').src;
        if (!currentImage.includes('IMG/')) {
            localStorage.setItem('imagePreview', currentImage);
        }
    });
</script>

<?php
require_once "view/components/footer.php";
?>
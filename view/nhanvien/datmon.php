<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 3) {
    header("Location: ?controller=dang_nhap&role=3");
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
        }

        .addtocart {
            background-color: darkgreen;
            /* Màu nền của nút */
            color: #fff;
            /* Màu chữ của nút */
            padding: 10px 20px;
            /* Kích thước nút */
            font-size: 16px;
            /* Kích thước chữ */
            border: none;
            border-radius: 5px;
            /* Bo tròn góc */
            cursor: pointer;
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        .addtocart:hover {
            background-color: #c0392b;
            /* Màu nền khi hover */
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="?controller=nhan_vien" class="navbar-brand p-0">
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
                        <a href="?controller=quan_li" class="nav-item nav-link active">Trang chủ</a>
                        <!--<a href="about.html" class="nav-item nav-link">About</a>-->
                        <a href="?controller=dexuatmonan&role=3" class="nav-item nav-link">Đề Xuất Món Ăn</a>
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
                    <a href="?controller=datmon&role=3" class="btn btn-primary py-2 px-4">Đặt Món Ngay</a>
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
        <!-- Navbar & Hero End -->

        <body>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                <h1 class="mb-5">Most Popular Items</h1>
            </div>


            <div class="container-xxl py-5">
                <div class="container">
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        <?php foreach ($menuWithDishes as $menuData) {
                            $menu = $menuData['menu'];
                            $dishes = $menuData['dishes'];

                            echo '
                        <div class="thu_them"> 
                        <h1 class="thu">' ."Thực đơn ngày " .date("d-m", strtotime($menu['NgayTao'])) ." (" .date('l', strtotime($menu['NgayTao'])) .")" . '</h1>
                        </div>';

                            $uniqueTypes = array_unique(array_column($dishes, 'MaLoaiMonAn'));

                            if (!empty($uniqueTypes)) {
                                // Display tabs
                                echo '<ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">';
                                foreach ($uniqueTypes as $tabValue) {
                                    $isActive = ($tabValue == $uniqueTypes[0]) ? 'active' : '';

                                    // Find the dish type name based on $tabValue
                                    $dishTypeName = '';
                                    foreach ($arr_loai as $loai) {
                                        if ($loai['MaLoaiMonAn'] == $tabValue) {
                                            $dishTypeName = $loai['TenLoaiMonAn'];
                                            break;
                                        }
                                    }

                                    echo '
                                <li class="nav-item">
                                    <a class="nav-link ' . $isActive . '" data-bs-toggle="pill" href="#tab-' . $menu['MaThucDon'] . '-' . $tabValue . '">
                                        ' . $dishTypeName . '
                                    </a>
                                </li>';
                                }
                                echo '</ul>';

                                // Display tab content
                                echo '<div class="tab-content">';
                                foreach ($uniqueTypes as $tabValue) {
                                    echo '
                                    <div class="tab-pane fade p-0 ' . ($tabValue == $uniqueTypes[0] ? 'show active' : '') . '" id="tab-' . $menu['MaThucDon'] . '-' . $tabValue . '">';
                                    echo '
                                        <div class="row g-4 justify-content-between">';

                                    foreach ($dishes as $dish) {
                                        if ($dish['MaLoaiMonAn'] == $tabValue) {
                                            echo '
                                            <div class="col-lg-6">
                                            <form action="?controller=nhan_vien&action=addcart&role=3" method="post">
                                                    <div class="d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="view/assets/img/' . $dish['HinhAnh'] . '" alt="" style="width: 80px;">
                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                            <input type="hidden" name="MaThucDon" value="' . $dish['MaThucDon'] . '">
                                                            <input type="hidden" name="MaMon" value="' . $dish['MaMon'] . '">
                                                            <input type="hidden" name="MaLoaiMonAn" value="' . $dish['MaLoaiMonAn'] . '">
                                                            <input type="hidden" name="ngayNhanMon" value="' . $dish['NgayTao']. '">
                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                <span>' . $dish['TenMonAn'] . '</span>
                                                                <input type="hidden" name="formIdentifier" value="' . $dish['MaThucDon'] . '-' . $dish['MaMon'] . '">
                                                                <input type="hidden" value="' . $dish['MaMon'] . '" name="id">
                                                                <input type="hidden" value="' . $dish['TenMonAn'] . '" name="tensp">
                                                                <input type="hidden" value="' . $dish['GiaMonAn'] . '" name="giasp">
                                                                <input type="hidden" value="' . $dish['HinhAnh'] . '" name="hinhanh">
                                                                <input type="hidden" name="formIdentifier" value="' . $dish['MaThucDon'] . '-' . $dish['MaMon'] . '">';
                                                                if(date('Y-m-d') >= $dish['NgayTao']) {
                                                                    
                                                                }
                                                                else{
                                                                    echo '<input type="submit" class="addtocart" value="V" name="addtocart">';
                                                                }
                                                            echo '</h5>
                                                            <small class="fst-italic" style="max-width: 360px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . $dish['MoTaMonAn'] . '</small>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>';
                                        }
                                    }
                                    echo '
                                    </div>
                                </div>';
                                }
                                echo '</div>';
                                echo '<hr>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </body>

</html>
<?php
require_once "view/components/footer.php";
?>
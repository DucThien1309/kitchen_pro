<?php
// session_start();
if (empty($_SESSION["id"])) {
    header("Location: ?error=Bạn cần đăng nhập!!!");
}
if ($_SESSION["role"] != 1) {
    header("Location: ?controller=dang_nhap&role=1");
}
?>

<?php
    $curentDate = date('Y-m-d');
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
                                <a href="?controller=quan_li" class="nav-item nav-link active">Trang Chủ</a>
                                <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
                                <!--<a href="service.html" class="nav-item nav-link">Service</a>-->
                                <!-- <a href="?controller=quan_li&action=view_thucdon&role=1" class="nav-item nav-link">Quản Lý Thực Đơn</a> -->
                                <!-- <a href="?controller=nguyen-lieu&role=1" class="nav-item nav-link">Quản Lý
                                    Nguyên
                                    Liệu</a> -->
                                <!--Nguyên liệu-->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản Lý Nguyên Liệu</a>
                                    <div class="dropdown-menu m-0">
                                    <a href="?controller=nguyen-lieu&role=1" class="dropdown-item">Quản lý nguyên liệu</a>
                                    <a href="?controller=nguyen-lieu&action=thanh-phan-mon-an&role=1" class="dropdown-item">Nguyên liệu món ăn</a>
                                    <a href="?controller=nguyen-lieu&action=danh-sach-can-mua" class="dropdown-item">Nguyên liệu cần mua</a>
                                    </div>
                                </div>
                                <!--Hết Nguyên Liệu-->
                                <!--Món ăn-->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản Lý Món Ăn</a>
                                    <div class="dropdown-menu m-0">
                                        <a href="?controller=mon-an&role=1" class="dropdown-item">Xem bảng quản lí món ăn</a>
                                        <a href="?controller=xemthongkemonan&role=1" class="dropdown-item">Xem thống kê món ăn</a>
                                        <a href="?controller=xemdexuatmonan&role=1" class="dropdown-item">Xem đề xuất món ăn</a>
                                    </div>
                                </div>
                                <!--Hết món ăn-->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Quản
                                        Lý
                                        Người
                                        Dùng</a>
                                    <div class="dropdown-menu m-0">
                                        <a href="?controller=dang_ky&role=1" class="dropdown-item">Thêm nhân
                                            viên</a>
                                        <a href="?controller=dang_ky_theo_ds&role=1" class="dropdown-item">Thêm
                                            nhân
                                            viên theo
                                            danh sách</a>
                                    </div>
                                </div>
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
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
        <!-- <h1 class="mb-5">Most Popular Items</h1> -->
    </div>


    <form action="?controller=quan_li&action=create&role=1" method="post">
        <!-- Modal -->
        <button type="button" href="" id="them" data-toggle="modal" data-target="#myModal">
            Thêm Món Ăn
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: flex; flex-direction: column;">
                        <h5 class="modal-title">Danh sách món ăn</h5>
                        <select name="mySelect" id="" style="
                            background: #fab44b;
                            border: 3px solid rgb(84, 73, 116);
                            width: 300px;
                            height: 50px;
                            font-size: large;
                        ">
                            <?php
                            foreach ($arr as $key => $value) {
                                echo "<option value=" . $value['MaThucDon'];
                                // if(date('Y-m-d') >= $value['NgayTao']) {
                                if( $curentDate >= $value['NgayTao']) {
                                    echo ' disabled';
                                }
                                echo">" .date('l', strtotime($value['NgayTao'])) ." " .date("d-m-Y", strtotime($value['NgayTao'])) . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="modal-body">
                        <div class="row g-4">
                            <?php foreach ($monan as $monAn) : ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <?php echo $monAn['HinhAnh']; ?>
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <input type="hidden" value="<?php echo $monAn["MaMon"]; ?>"></input>
                                                <span>
                                                    <?php echo $monAnTest = $monAn["TenMonAn"]; ?>
                                                </span>
                                                <span class="text-primary">
                                                    <div class="form-group">
                                                        <input type="checkbox" name="selectedMonAn[]" value="<?php echo $monAn["MaMon"]; ?>">
                                                        <label for="myCheckbox"></label>
                                                    </div>
                                                </span>
                                            </h5>
                                            <small class="fst-italic">
                                                <?php echo $monAn["MoTaMonAn"]; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Đóng</button>
                        <button type="submit" class="btn btn-primary" formaction="?controller=quan_li&action=store&role=1" id="addModal">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal -->

    <!-- Update the form action and method -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <?php foreach ($menuWithDishes as $menuData) {
                    $menu = $menuData['menu'];
                    $dishes = $menuData['dishes'];

                    echo '
                        <div class="thu_them"> 
                            <h1 class="thu">' ."Thực đơn ngày " .date("d-m", strtotime($menu['NgayTao'])) ." (" .date('l', strtotime($menu['NgayTao'])) .")" . '</h1>'
                            // .$menu['NgayTao']
                        .'</div>';

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
                                            <form action="?controller=quan_li&action=delete&role=1" method="post">
                                                    <div class="d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="view/assets/img/' . $dish['HinhAnh'] . '" alt="" style="width: 80px;">
                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                            <input type="hidden" name="MaThucDon" value="' . $dish['MaThucDon'] . '">
                                                            <input type="hidden" name="MaMon" value="' . $dish['MaMon'] . '">
                                                            <input type="hidden" name="MaLoaiMonAn" value="' . $dish['MaLoaiMonAn'] . '">
                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                <span>' . $dish['TenMonAn'] . '</span>
                                                                <input type="hidden" name="formIdentifier" value="' . $dish['MaThucDon'] . '-' . $dish['MaMon'] . '">';
                                                                //Nếu ngày hiện tại đã qua ngày ra thực đơn thì nút xóa bị disabled
                                                                if($curentDate < $menu['NgayTao']) {
                                                                    echo '<button type="submit" class="xoaMonAn" name="xoaMonAn" onclick="return confirm(`Có xác nhận xoá không`)">X</button>';
                                                                }
                                                                else {
                                                                    '<button type="submit" class="xoaMonAn" name="xoaMonAn" disabled onclick="return confirm(`Có xác nhận xoá không`)">X</button>';
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
    <!-- Navbar & Hero End -->
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
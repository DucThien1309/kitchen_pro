<?php
class NhanVienController
{
    // Hiển thị trang đặt món. Sau này sẽ bỏ thực đơn hằng ngày vào đây
    public function index(): void
    {
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';
        $monan = (new MonAn())->all();
        $arr = (new ThucDon())->all();
        $arr_loai = (new ThucDon())->all_loai();

        $thucDonModel = new ThucDon();
        $menus = $thucDonModel->all();

        $menuWithDishes = [];
        foreach ($menus as $menu) {
            $menuId = $menu['MaThucDon'];
            $menuWithDishes[] = [
                'menu' => $menu,
                'dishes' => $thucDonModel->xemMonAnTheoTD($menuId),
                'categories' => $thucDonModel->getCategoriesForMenu($menuId)
            ];
        }
        require_once 'view/nhanvien/index.php';
    }

    public function viewdatmon(): void
    {
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';
        $monan = (new MonAn())->all();
        $arr = (new ThucDon())->all();
        $arr_loai = (new ThucDon())->all_loai();

        $thucDonModel = new ThucDon();
        $menus = $thucDonModel->all();

        $menuWithDishes = [];
        foreach ($menus as $menu) {
            $menuId = $menu['MaThucDon'];
            $menuWithDishes[] = [
                'menu' => $menu,
                'dishes' => $thucDonModel->xemMonAnTheoTD($menuId),
                'categories' => $thucDonModel->getCategoriesForMenu($menuId)
            ];
        }
        require_once 'view/nhanvien/datmon.php';
    }

    public function view_index(): void
    {
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';

        $monAnModel = new MonAn();

        // Lấy dữ liệu từ Model
        $categories = $monAnModel->getAllDishCategories();

        // Xử lý dữ liệu
        $dishData = [];

        foreach ($categories as $category) {
            // Lấy món ăn theo từng loại
            $dishes = $monAnModel->getDishes($category['id']);

            // Gán vào mảng kết quả
            $dishData[] = [
                "category" => $category,
                "dishes" => $dishes
            ];
        }

        // Truyền $dishData sang view
        require_once 'view/nhanvien/index.php';  // Make sure this line is after defining $dishData
    }

    // hiển thị trang giỏ hàng
    public function viewcart(): void
    {
        require "view/monan/viewcart.php";
    }
    // thêm hàng vào trang giỏ hàng
    public function addcart(): void
    {
        // Lấy dữ liệu từ form để lưu vào giỏ
        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
            $id = $_POST['id'];
            $tensp = $_POST['tensp'];
            $giasp = $_POST['giasp'];
            $hinhanh = $_POST['hinhanh'];
            $ngaynhanmon = $_POST['ngayNhanMon'];
            // Nếu số lượng tự chọn thì sẽ lấy số lượng nhân viên chọn
            if (isset($_POST['sl']) && ($_POST['sl'] > 0)) {
                $sl = $_POST['sl'];
            } else {
                $sl = 1;
            }
            // kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không, nếu có chỉ cập nhật lại số lượng,
            $fg = 0;
            $i = 0;
            foreach ($_SESSION['giohang'] as $i => $item) {
                if ($item[1] === $tensp) {
                    $_SESSION['giohang'][$i][4] += $sl;
                    $fg = 1;
                    break;
                }
                $i++;
            }
            //không thì add mới
            // khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
            if ($fg == 0) {
                $item = array($id, $tensp, $giasp, $hinhanh, $sl, $ngaynhanmon);
                // $item = array($id, $tensp, $giasp, $ngaynhanmon, $sl);
                $_SESSION['giohang'][] = $item;
            }
        }

        //view giỏ hàng lên
        header('location: ?controller=nhan_vien&action=viewcart');
    }
    // xóa giỏ hàng và xóa một sản phẩm trong giỏ hàng
    public function delcart(): void
    {
        if (isset($_GET['i']) && $_GET['i'] >= 0) {
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                unset($_SESSION['giohang'][$_GET['i']]);
                $_SESSION['giohang'] = array_values($_SESSION['giohang']); // Reset lại chỉ số mảng
            }
        } else {
            if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
        } // nếu giỏ hàng có sp thì ở lại còn không thì quay về index
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            header('location:index.php?controller=nhan_vien&action=viewcart');
        } else {
            header('location:index.php?controller=nhan_vien');
        }
    }
    // đặt hàng
    //order
    public function order(): void
    {
        include 'view/donhang/order.php';
    }
    // thoát khỏi trang giỏ hàng
    public function exit(): void
    {
        require 'view/nhanvien/index.php';
    }
    // đưa đơn hàng vào danh sách đơn hàng
    //store
    public function store(): void
    {
        require 'model/monan/MonAn.php';
        (new MonAn())->store($_POST);
        header("Location: ?controller=datmon&action=vieworder");
        // xóa giỏ hàng sau khi đã đặt món 
        if (isset($_GET['i']) && $_GET['i'] >= 0) {
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                unset($_SESSION['giohang'][$_GET['i']]);
                $_SESSION['giohang'] = array_values($_SESSION['giohang']); // Reset lại chỉ số mảng
            }
        } else {
            if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
        }
    }
    // view trang danh sách hóa đơn
    public function vieworder(): void
    {
        require 'model/monan/MonAn.php';
        require 'model/HoaDon.php';
        $arr = (new MonAn())->alldonhang();
        $sumOfAmountOfInvoice = (new HoaDon())->sumOfAmountOfInvoice($_SESSION['id']);
        require 'view/donhang/allordered.php';
    }
    // xem chi tiết đơn hàng
    public function viewdetail(): void
    {
        $maDonHang = $_REQUEST['maDonHang'];
        require 'model/monan/MonAn.php';
        $arr = (new MonAn())->finddonhang($maDonHang);
        // print_r($arr);
        require 'view/donhang/viewdetail.php';
    }
}

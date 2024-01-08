<?php

class ThucDonController
{
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
        require_once 'view/quanli/index.php';
    }


    public function create(): void
    {
        require 'view/quanli/index.php';
    }

    // Trong hàm store() của ThucDonController
    public function store()
    {
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';

        $monan = (new MonAn())->all();
        $arr = (new ThucDon())->all();

        if (isset($_POST['selectedMonAn'])) {
            $monAn = new ThucDon();
            $maThucDon = $_POST['mySelect'];
            $selectedMonAn = $_POST['selectedMonAn'];

            // Kiểm tra xem đã thêm món ăn cho ngày hiện tại chưa
            if (!$monAn->isMenuExistForToday($maThucDon)) {
                $existingDishes = $monAn->xemMonAnTheoTD($maThucDon);
                $existingDishIds = array_column($existingDishes, 'MaMon');
                $newDishes = array_diff($selectedMonAn, $existingDishIds);

                if (!empty($newDishes)) {
                    foreach ($newDishes as $maMon) {
                        $monAn->create($maThucDon, $maMon);
                    }
                    echo "<script>alert('Đã thêm món ăn'); window.location.href='index.php?controller=quan_li';</script>";
                } else {
                    echo "<script>alert('Món ăn đã có trong thực đơn'); window.location.href='index.php?controller=quan_li';</script>";
                }
            } else {
                echo "<script>alert('Thực đơn cho ngày hiện tại đã tồn tại món ăn'); window.location.href='index.php?controller=quan_li';</script>";
            }
        }
    }

    public function delete()
    {
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';

        if (isset($_POST['xoaMonAn']) && isset($_POST['MaThucDon']) && isset($_POST['MaMon'])) {
            $maThucDon = $_POST['MaThucDon'];
            $maMon = $_POST['MaMon'];

            $thucDonModel = new ThucDon();
            $thucDonModel->delete($maThucDon, $maMon);

            header('Location: ./?controller=quan_li');
        }
    }
}

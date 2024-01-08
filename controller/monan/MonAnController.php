<?php

class MonAnController
{
    //Nam's code start -----------------------------
    // quản lí món ăn

    // hiển thị trang xem tất cả món ăn
    public function indexmonan(): void
    {
        require 'model/monan/MonAn.php';
        $arr = (new MonAn())->all();    
        require 'view/monan/quanlimonan/indexmonan.php';
    }
    // hiển thị trang thêm mới món ăn
    public function create(): void
    {
        require 'model/monan/MonAn.php';
        $arr2 = (new MonAn())->allloaimonan();
        require 'view/monan/quanlimonan/create.php';
    }
    // lưu món ăn được thêm mới vào csdl
    public function storenewdish(): void
    {
        require 'model/monan/MonAn.php';
        (new MonAn())->storenewdish($_POST);
        header("Location:?controller=mon-an&role=1");
    }
    // xóa món ăn
    public function delete(): void
    {
        require 'model/monan/MonAn.php';
        (new MonAn())->delete($_GET['maMon']);
        header("Location:?controller=mon-an&role=1");
    }
    // hiển thị trang chỉnh sửa món ăn
    public function edit(): void
    {
        $maMon = $_REQUEST['maMon'];
        require 'model/monan/MonAn.php';
        $arr2 = (new MonAn())->allloaimonan();
        $each = (new MonAn())->find($maMon);
        require 'view/monan/quanlimonan/edit.php';
    }
    // Update món ăn vào csdl
    public function update()
    {
        require 'model/monan/MonAn.php';
        (new MonAn())->update($_POST);
        header("Location:?controller=mon-an&role=1");
    }
    // xem thống kê món ăn
    public function indexthongke(): void
    {
        require 'model/monan/MonAn.php';
        $revenueData = (new MonAn())->viewrevenue();
        $month = $revenueData['month'];
        $amount = $revenueData['amount'];
        $foodData = (new MonAn())->viewfood();
        $foodname = $foodData['foodname']; 
        $quantity = $foodData['quantity']; 
        require 'view/monan/quanlimonan/thongkeindex.php';
    }
    // xem đề xuất món ăn của nhân viên
    public function indexdexuat(): void
    {
        require 'model/monan/MonAn.php';
        $arr = (new Monan())->viewsuggest();
        require 'view/monan/quanlimonan/dexuatindex.php';
    }

    // ROLE NHÂN VIÊN
    // nhân viên đặt món
    public function index(): void
    {
        require 'model/monan/MonAn.php';
        $arr = (new MonAn())->all();
        require 'view/nhanvien/index.php';
    }
    // hiển thị trang đề xuất món ăn
    public function suggest(): void
    {
        require 'view/monan/dexuatmonan.php';
    }
    // Lưu món ăn nhân viên đề xuất vào csdl
    public function store(): void
    {
        require 'model/monan/MonAn.php';
        $arr = (new MonAn())->viewownsuggest();
        (new MonAn())->create($_POST);
        require 'view/monan/success.php';
    }
    //Nam's code end -----------------------------
}

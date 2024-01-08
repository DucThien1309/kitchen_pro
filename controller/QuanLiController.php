<?php
class QuanLiController
{
    //Thien'code add -- start
    public function index(): void
    {

        // require_once "view/quanli/index.php";
        require_once 'model/ThucDon.php';
        require_once 'model/monan/MonAn.php';

        $arr_td = (new ThucDon())->show_thucdon_mamon();
        $monan = (new MonAn())->allArr();
        $arr = (new ThucDon())->all();

        // require_once 'view/thucdon/index.php';
        require_once 'view/quanli/index.php';
    }
    //Thien'code add -- start

    public function create(): void
    {
    }

    public function store(): void
    {
    }

    public function edit(): void
    {
    }

    public function update(): void
    {
    }

    public function delete(): void
    {
    }
}

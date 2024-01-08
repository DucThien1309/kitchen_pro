<?php
class PhucVuController
{
    public function index(): void
    {
        require_once "model/PhucVu.php";
        $arr = (new PhucVu())->all();
        // print_r($arr);
        require_once "view/phucvu/index.php";
    }

    public function xac_nhan(): void
    {
        require_once "model/PhucVu.php";
        (new PhucVu())->xac_nhan($_GET["id"]);
        header("Location: ?controller=phuc_vu");
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

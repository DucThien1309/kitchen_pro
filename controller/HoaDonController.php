<?php

class HoaDonController
{

    public function index()

    {
        require_once "model/HoaDon.php";
        $arrs = (new HoaDon())->index($_SESSION["id"]);
        $sumOfAmount = (new HoaDon())->sumOfAmountOfInvoice($_SESSION["id"]);
        require_once "view/hoadon/index.php";
    }

    public function filterInvoiceByMonth()

    {
        require_once "model/HoaDon.php";
        $arrs = (new HoaDon())->processFilterInvoiceByMonth($_POST, $_SESSION["id"]);
        $sumOfAmount = (new HoaDon())->sumOfAmountOfInvoice($_SESSION["id"]);
        $calendar = $_POST["calendar"];
        require_once "view/hoadon/index.php";
    }

    public function invoiceDetails()
    {
        if (isset($_GET["invoice_id"])) {
            require_once "model/HoaDon.php";
            $arr_invoice_details = (new HoaDon())->selectInvoiceDetails($_GET["invoice_id"]);
            // print_r($arr_invoice_details);
            // echo "hello";
            require_once "view/hoadon/invoice_details.php";
        } else {
            header("Location: ?controller=nhan_vien&role=3&action=invoice");
        }
    }
}

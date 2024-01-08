<?php

require_once 'model/Connect.php';

class DauBep
{
    private string $table = 'daubep';

    public function all()
    {
        $maNhanVien = $_SESSION['id'];
        $currentDate = date("Y-m-d");
        $sql = "SELECT monan.TenMonAn, COUNT(chitietdonhang.SoLuong) AS SoLuong FROM monan JOIN chitietdonhang ON monan.MaMon = chitietdonhang.MaMon JOIN donhang ON donhang.MaDonHang = chitietdonhang.MaDonHang WHERE donhang.ThoiGianNhanMon = '$currentDate' GROUP BY monan.MaMon";
        $result = (new Connect())->select($sql);
        return $result;
    }

    public function create($params): void
    {
    }

    public function find($ma)
    {
    }

    public function update(array $params)
    {
    }

    public function delete($ma)
    {
    }
}

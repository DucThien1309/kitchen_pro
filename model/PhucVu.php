<?php

require_once 'model/Connect.php';

class PhucVu
{
    private string $table = 'phucvu';

    public function all()
    {
        $maNhanVien = $_SESSION['id'];
        $currentDate = date("Y-m-d");
        // $sql = "select nhanvien.MaNhanVien, nhanvien.HoTen, donhang.MaDonHang, monan.MaMon, monan.TenMonAn ,COUNT(chitietdonhang.SoLuong) AS SoLuong FROM nhanvien JOIN donhang ON donhang.MaNhanVien = nhanvien.MaNhanVien JOIN chitietdonhang ON chitietdonhang.MaDonHang = donhang.MaDonHang JOIN monan ON monan.MaMon = chitietdonhang.MaMon where donhang.ThoiGianNhanMon = '2023-12-18' GROUP BY monan.MaMon";
        
        $sql = "WITH MonAnNhanVien AS ( SELECT nv.MaNhanVien, HoTen, TenMonAn, GiaMonAn, HinhAnh, SUM(SoLuong) AS TongSoLuong, ThoiGianNhanMon, ThoiGianDatMon, GhiChu, TrangThaiDonHang, TrangThaiGiaoMon FROM chitietdonhang t5 JOIN monan t3 ON t5.MaMon = t3.MaMon JOIN donhang t4 ON t5.MaDonHang = t4.MaDonHang JOIN nhanvien nv ON nv.MaNhanVien = t4.MaNhanVien WHERE ThoiGianNhanMon = '$currentDate' AND t4.TrangThaiGiaoMon = 0 GROUP BY nv.MaNhanVien, t3.MaMon HAVING TongSoLuong > 0 ) SELECT MaNhanVien, HoTen, TenMonAn, GiaMonAn, HinhAnh, TongSoLuong, ThoiGianNhanMon, ThoiGianDatMon, GhiChu, TrangThaiDonHang, TrangThaiGiaoMon FROM MonAnNhanVien";
        $result = (new Connect())->select($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        else
            return null;
        return $data;
    }

    public function xac_nhan($params): void
    {
        $sql = "UPDATE donhang
                INNER JOIN nhanvien ON donhang.MaNhanVien = nhanvien.MaNhanVien
                SET donhang.TrangThaiGiaoMon = 1
                WHERE nhanvien.MaNhanVien = $params";
        (new Connect())->execute($sql);
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

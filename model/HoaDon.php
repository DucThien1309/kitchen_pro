<?php
require_once 'model/Connect.php';

class HoaDon
{
    public function index($id)
    {
        $sql = "SELECT hoadon.MaHoaDon, hoadon.TongTien, 
        donhang.TrangThaiDonHang, nhanvien.MaNhanVien from 
        hoadon join donhang on donhang.MaDonHang = hoadon.MaDonHang
        join nhanvien on nhanvien.MaNhanVien = donhang.MaNhanVien 
        where nhanvien.MaNhanVien = $id ORDER BY donhang.ThoiGianNhanMon DESC";

        $result = (new Connect())->select($sql);
        // var_dump($result);
        // $each = mysqli_fetch_assoc($result);
        // print_r($each);
        // foreach ($result as $feach) :
        //     echo $feach["MaHoaDon"];
        //     echo "<br>";
        //     echo $feach["TongTien"];
        //     echo "<br>";
        //     echo $feach["TrangThaiDonHang"];
        //     echo "<br>";
        // endforeach;
        return $result;
    }

    public function sumOfAmountOfInvoice($id)
    {
        // $sql = "SELECT SUM(hoadon.TongTien) as 'TongTien' from 
        // hoadon join donhang on donhang.MaDonHang = hoadon.MaDonHang 
        // join nhanvien on nhanvien.MaNhanVien = donhang.MaNhanVien 
        // where nhanvien.MaNhanVien = $id and donhang.TrangThaiDonHang = 0";
        
        // $sql = "SELECT nhanvien.MaNhanVien, SUM(hoadon.TongTien) AS TongTien FROM `hoadon` 
        // JOIN donhang ON donhang.MaDonHang = hoadon.MaHoaDon JOIN nhanvien 
        // ON nhanvien.MaNhanVien = donhang.MaNhanVien GROUP BY nhanvien.MaNhanVien 
        // HAVING nhanvien.MaNhanVien = $id";

        $sql = "SELECT nhanvien.MaNhanVien, donhang.MaDonHang, hoadon.MaHoaDon,
                SUM(hoadon.TongTien) as TongTien from nhanvien JOIN donhang 
                ON nhanvien.MaNhanVien = donhang.MaNhanVien JOIN hoadon ON 
                hoadon.MaDonHang = donhang.MaDonHang WHERE nhanvien.MaNhanVien = $id 
                AND donhang.TrangThaiDonHang = 0";

        $sumOfAmount = (new Connect())->select($sql);
        $sumOfAmount = mysqli_fetch_array($sumOfAmount);
        return $sumOfAmount;
    }

    public function processFilterInvoiceByMonth($params, $id)
    {
        $month = $params["calendar"];
        if ($month == 0) {
            $sql = "SELECT hoadon.MaHoaDon, hoadon.TongTien, 
                    donhang.TrangThaiDonHang, nhanvien.MaNhanVien from 
                    hoadon join donhang on donhang.MaDonHang = hoadon.MaDonHang 
                    join nhanvien on nhanvien.MaNhanVien = donhang.MaNhanVien 
                    where nhanvien.MaNhanVien = $id ORDER BY donhang.ThoiGianNhanMon DESC";

            $result = (new Connect())->select($sql);
            return $result;
        }
        $sql = "SELECT hoadon.MaHoaDon, hoadon.TongTien, 
                donhang.TrangThaiDonHang, nhanvien.MaNhanVien from 
                hoadon join donhang on donhang.MaDonHang = hoadon.MaDonHang 
                join nhanvien on nhanvien.MaNhanVien = donhang.MaNhanVien 
                where nhanvien.MaNhanVien = $id and Month(donhang.ThoiGianNhanMon) = $month";

        $result = (new Connect())->select($sql);
        return $result;
    }
    //query tổng tiền theo tháng
    // select SUM(hoadon.TongTien) as "TongTien" 
    // from hoadon join donhang on donhang.MaDonHang = hoadon.MaDonHang 
    // join nhanvien on nhanvien.MaNhanVien = donhang.MaNhanVien 
    // where nhanvien.MaNhanVien = 1 and donhang.TrangThaiDonHang = 0 
    // and MONTH(donhang.ThoiGianNhanMon) = 11;

    public function selectInvoiceDetails($invoiceId)
    {
        $sql = "SELECT monan.TenMonAn, chitietdonhang.SoLuong, monan.GiaMonAn, 
                chitietdonhang.SoLuong * monan.GiaMonAn as TongGiaMonAn, donhang.ThoiGianDatMon,
                donhang.TrangThaiDonHang, donhang.ThoiGianNhanMon, donhang.TrangThaiGiaoMon
                from donhang join chitietdonhang on donhang.MaDonHang = chitietdonhang.MaDonHang 
                join monan on monan.MaMon = chitietdonhang.MaMon 
                where donhang.MaDonHang = $invoiceId";

        $result = (new Connect())->select($sql);
        return $result;
    }
    // "SELECT monan.TenMonAn, chitietdonhang.SoLuong, 
    //             donhang.ThoiGianDatMon, donhang.ThoiGianNhanMon, 
    //             donhang.TrangThaiDonHang from donhang 
    //             join chitietdonhang on donhang.MaDonHang = chitietdonhang.MaDonHang 
    //             join monan on monan.MaMon = chitietdonhang.MaMon 
    //             where donhang.MaDonHang = $invoiceId";
}

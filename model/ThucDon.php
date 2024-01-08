<?php

require_once 'model/Connect.php';

class ThucDon
{
    private $table = 'thucdon';

    public function all()
    {
        $today = date("Y-m-d");
        if (date("l") == "Sunday") {
            // echo "today is sunday";
            //deactive các thực đơn cũ
            $sql = "UPDATE `thucdon` 
            SET `active` = b'0' WHERE thucdon.NgayTao <= '$today' 
            and `thucdon`.`active` = 1";
            (new Connect())->execute($sql);

            for ($i = 1; $i <= 6 ; $i++) {
                $increseDate = "+" .$i ." day"; 
                $date = date("Y-m-d", strtotime($increseDate, strtotime($today)));

                //check ton tai thuc don hay chua
                $sql = "SELECT * FROM `thucdon` WHERE thucdon.NgayTao = '$date'";
                $result = (new Connect())->select($sql);
                $number_rows = mysqli_num_rows($result);

                //check unique TaiKhoan
                if ($number_rows == 1) {
                    continue;
                }

                //tao thuc don
                $moTa = "thực đơn ngày" ." " .$date;
                $sql = "INSERT INTO `thucdon` (`MaThucDon`, `NgayTao`, `MoTa`, `active`) 
                VALUES (NULL, '$date', '$moTa', b'1')";
                (new Connect())->execute($sql);
            }
        }
        // else {
        //     echo "today not sunday";
        // }
        $sql = "select * from $this->table where active = 1 order by NgayTao";
        $result = (new Connect())->select($sql);
        return $result;
    }

    private $table3 = 'loaimonan';
    public function all_loai()
    {
        $sql = "select * from $this->table3";
        $result = (new Connect())->select($sql);
        return $result;
    }

    public function xemMonAnTheoTD($maThucDon)
    {
        $sql = "SELECT monan.MaMon, monan.TenMonAn, monan.GiaMonAn, monan.MoTaMonAn, loaimonan.MaLoaiMonAn,
                thucdon.MaThucDon, thucdon.NgayTao, thucdon.MoTa AS ThucDonMoTa, monan.HinhAnh, loaimonan.TenLoaiMonAn
                FROM monan
                JOIN loaimonan on loaimonan.MaLoaiMonAn = monan.MaLoaiMonAn
                JOIN thucdon_monan ON monan.MaMon = thucdon_monan.MaMon
                JOIN thucdon ON thucdon_monan.MaThucDon = thucdon.MaThucDon
                WHERE thucdon_monan.MaThucDon = $maThucDon";
        $result = (new Connect())->select($sql);
        $dishes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $dishes[] = $row;
        }

        return $dishes;
    }

    public function getCategoriesForMenu($maThucDon)
    {
        $sql = "SELECT DISTINCT loaimonan.MaLoaiMonAn, loaimonan.TenLoaiMonAn
                FROM loaimonan
                JOIN monan ON loaimonan.MaLoaiMonAn = monan.MaLoaiMonAn
                JOIN thucdon_monan ON monan.MaMon = thucdon_monan.MaMon
                JOIN thucdon ON thucdon_monan.MaThucDon = thucdon.MaThucDon
                WHERE thucdon_monan.MaThucDon = $maThucDon";
        $result = (new Connect())->select($sql);
        $categories = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        return $categories;
    }


    private $table2 = 'thucdon_monan';

    public function create($maThucDon, $maMon)
    {
        $sql = "INSERT INTO $this->table2 (MaThucDon,MaMon) VALUES ($maThucDon,$maMon)";
        (new Connect())->execute($sql);
    }

    // Trong class ThucDon
    public function delete($maThucDon, $maMon): bool
    {
        $sql = "DELETE FROM $this->table2 WHERE MaThucDon = $maThucDon AND MaMon = $maMon";
        $connect = new Connect();
        $connect->execute($sql);
        return true;
    }


    // Trong class ThucDon
    public function isMenuExistForToday($maThucDon)
    {
        $today = date("Y-m-d");
        $sql = "SELECT COUNT(*) as count FROM $this->table WHERE MaThucDon = $maThucDon AND NgayTao = '$today'";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_assoc($result);
        return ($row['count'] > 0);
    }
}

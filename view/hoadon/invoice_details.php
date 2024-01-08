<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hóa Đơn - Kitchen Pro ++</title>
</head>

<body>
    <center>
        <h1>Chi Tiết Hóa Đơn</h1>
        <table border="1" width="70%" style="text-align: center;">
            <tr>
                <th>Tên Món Ăn</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Giá (Số lượng * Đơn giá)</th>
                <!-- <th>Thời gian đặt món</th> -->
                <!-- <th>Trạng Thái Thanh Toán</th>
                <th>Thời Gian Nhận Món</th> -->
            </tr>
            <?php
            foreach ($arr_invoice_details as $arr) :
                $thoi_gian_nhan_mon = date("d-m-Y", strtotime($arr["ThoiGianNhanMon"]));
                $thoi_gian_dat_mon = date("d-m-Y", strtotime($arr["ThoiGianDatMon"]));
                if($arr["TrangThaiGiaoMon"] == 1) {
                    $trang_thai_giao_mon = "Đã giao";
                }
                else {
                    $trang_thai_giao_mon = "Chưa giao";
                }
                echo '<tr>
                      <td>' . $arr["TenMonAn"] . '</td>
                      <td>' . $arr["SoLuong"] . '</td>
                      <td>' . $arr["GiaMonAn"] . '</td>
                      <td>' . $arr["TongGiaMonAn"] . '</td>';
            endforeach; ?>
            <?php
            // echo '<td rowspan="' . mysqli_num_rows($arr_invoice_details) . '">';
            // if (isset($arr["TrangThaiDonHang"])) {
            //     if ($arr["TrangThaiDonHang"] == 1)
            //         echo "Đã thanh toán";
            //     else {
            //         echo "Chưa thanh toán";
            //     }
            // }
            // echo "</td>";
            // $ThoiGianNhanMon = date("d-m-Y", strtotime($arr["ThoiGianNhanMon"]));
            // echo '<td rowspan="' . mysqli_num_rows($arr_invoice_details) . '>' . $ThoiGianNhanMon
            //     . "</td>";
            // echo '</tr>';
            ?>
        </table>
        <br>
        <span style="display: block; text-align: right; padding-right: 300px">
        Thời gian đặt món: 
        <?php 
            echo $thoi_gian_dat_mon;
        ?>
        </span>
        <span style="display: block; text-align: right; padding-right: 300px">
        Thời gian nhận món: 
        <?php 
            echo $thoi_gian_nhan_mon;
        ?>
        </span>
        <span style="display: block; text-align: right; padding-right: 300px">
        Trạng thái nhận món: 
        <?php 
            echo $trang_thai_giao_mon;
        ?>
        </span>
        <br>
        <a href="?controller=nhan_vien&role=3&action=invoice" style="display: block; text-align: right; margin-right: 360px; margin-left: 950px">Quay lại</a>
    </center>
</body>

</html>
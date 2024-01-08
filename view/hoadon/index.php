<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">Danh Sách Hóa Đơn</h1>
    <center>
        <h2>Tổng tiền bạn cần thanh toán: <br>
            <?php
            // print_r($sumOfAmount);
            echo $sumOfAmount["TongTien"] . "vnđ";
            // echo "<br>";
            // echo $calendar;
            ?>
        </h2>
        <a href="#">Thanh Toán Ngay</a>
        <br>
        <br>
        <form action="?controller=nhan_vien&role=3&action=select_invoice_by_month" method="POST">
            <select name="calendar" id="calendar">
                <?php
                if (isset($calendar) and $calendar != 0) {
                    for ($i = 0; $i <= 12; $i++) {
                        if ($i == 0) {
                            echo '<option value="' . $i . '">Tất cả các tháng</option>';
                            continue;
                        }
                        if ($calendar == $i) {
                            echo '<option value="' . $i . '" selected>Tháng ' . $i . '</option>';
                        } else {
                            echo '<option value="' . $i . '">Tháng ' . $i . '</option>';
                        }
                    }
                } else {
                    echo '
                <option value="0" selected>Tất cả các tháng</option>
                <option value="1">Tháng 1</option>
                <option value="2">Tháng 2</option>
                <option value="3">Tháng 3</option>
                <option value="4">Tháng 4</option>
                <option value="5">Tháng 5</option>
                <option value="6">Tháng 6</option>
                <option value="7">Tháng 7</option>
                <option value="8">Tháng 8</option>
                <option value="9">Tháng 9</option>
                <option value="10">Tháng 10</option>
                <option value="11">Tháng 11</option>
                <option value="12">Tháng 12</option>
                ';
                };
                ?>
            </select>
            <button>Lọc</button>
        </form>
        <!-- <a href="?controller=nhan_vien&role=3&action=select_invoice_by_month&month=$">Lọc</a> -->
        <br><br>
        <table border="1" style="text-align: center;" width="50%">
            <tr>
                <th>Mã Hóa Đơn</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái Thanh Toán</th>
                <th>Thao Tác</th>
            </tr>
            <?php
            foreach ($arrs as $arr) :
                echo '<tr>
                    <td>' . $arr["MaHoaDon"] . '</td>
                    <td>' . $arr["TongTien"] . '</td>
                    <td>';
                if (isset($arr["TrangThaiDonHang"])) {
                    if ($arr["TrangThaiDonHang"] == 1)
                        echo "Đã thanh toán";
                    else {
                        echo "Chưa thanh toán";
                    }
                }
                echo '</td>
                    <td>
                        <a href="?controller=nhan_vien&role=3&invoice_id=' . $arr["MaHoaDon"] . '&action=invoice_details">Xem chi tiết</a>
                    </td>
                </tr>';
            endforeach; ?>
        </table>
        <br>
        <a href="?controller=nhan_vien">Quay lại</a>
    </center>
</body>

</html>
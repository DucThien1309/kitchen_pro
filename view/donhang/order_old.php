<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h2,
    h3 {
        text-align: center;
        color: #333;
    }

    table {
        width: 60%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td:last-child {
        font-weight: bold;
    }

    td:first-child {
        text-align: center;
    }

    td:nth-child(3),
    td:nth-child(4) {
        text-align: center;
    }

    label {
        font-weight: bold;
        margin-right: 10px;
        color: #333;
    }

    input[type="date"] {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .button {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 5px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    .delete {
        background-color: #ff3333;
    }

    .delete:hover {
        background-color: #e60000;
    }
</style>

<body>
    <?php

    if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
        $tong = 0;
        echo '<h2>Thông tin đơn hàng</h2>';
        echo '<h3>Tên người đặt: Mai Thị Huỳnh Như </h3>';
        echo '<label for="ngayDat">Ngày đặt:</label>';
        echo '<input type="date" id="ngayDat" name="ngayDat" value="' . date('Y-m-d') . '" disabled><br><br>';
        echo '<label for="ngayNhanMon">Ngày nhận món:</label>';
        echo '<input type="date" id="ngayNhanMon" name="ngayNhanMon"><br><br>';
        echo '<table>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>';
        $i = 1;
        foreach ($_SESSION['giohang'] as $value) {
            echo '<tr>
                <td>' . $i . '</td>
                <td>' . $value[1] . '</td>
                <td>' . $value[4] . '</td>
                <td>' . $value[5] . '</td>
            </tr>';
            $tong += $value[5];
            $i++;
        }
        echo '<tr>
            <td colspan="3">Tổng giá trị đơn hàng:</td>
            <td>' . $tong . '</td>
        </tr>';
        echo '</table>';
    } else {
        echo 'Giỏ hàng trống.';
    }
    ?>
    <div class="button">
        <button type="submit" name="submit" value="submit">Thanh Toán</button>
        <button class="delete" type="submit" name="submit" value="submit">Hủy Đơn Hàng</button>
    </div>
    <br>
        <a href="?controller=nhan_vien&action=viewcart">Quay lại giỏ hàng</a>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    a:hover {
        background-color: #45a049;
    }
</style>

<body>
    <?php
    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
        echo '<table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
            <th>Value 5</th>
        </tr>';
        $i = 0;
        $tong = 0;
        foreach ($_SESSION['giohang'] as $key => $value) {
            // Kiểm tra nếu mảng có đủ phần tử
            if (count($value) >= 5) {
                $tt = floatval($value[2]) * floatval($value[4]); // Tính toán giá trị mới của thành tiền
                $tong += $tt;
                $_SESSION['giohang'][$key][5] = $tt; // Lưu giá trị mới vào mảng
                echo '<tr>
                <td>' . ($i + 1) . '</td>
                <td>' . $value[1] . '</td>
                <td>' . $value[3] . '</td>
                <td>' . $value[2] . '</td>
                <td>' . $value[4] . '</td>
                <td>' . $tt . '</td>
                <td><a href="?controller=datmon&action=delcart&i=' . $i . '">Xóa</a></td>
                </tr>';
                $i++;
            }
        }
        echo '<tr>
        <td colspan="5" >Tổng giá trị đơn hàng:</td><td>' . $tong . '</td><td></td>
        </tr>';
        echo '</table>';
    }
    ?>
    <a href="?controller=nhan_vien&action=datmon&role=3">Tiếp tục mua hàng</a>
    <a href="?controller=datmon&action=order">Đặt hàng</a>
    <a href="?controller=datmon&action=delcart">Xóa giỏ hàng</a>
</body>

</html>
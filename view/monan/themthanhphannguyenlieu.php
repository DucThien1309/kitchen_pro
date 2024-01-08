<?php
require_once 'controller/monan/index.php';
$controller = new MonAnController02();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
            height: 50px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="text"] {
            width: 50%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: auto; /* Căn giữa theo chiều ngang */
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .button {
            display: inline-block;
            background-color: #008CBA;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #005177;
        }

        /* Căn giữa nội dung cột "Thành Phần Món Ăn" */
        td.colspan-center {
            text-align: center;
        }
        select {
        width: 50%;
        padding: 8px;
        box-sizing: border-box;
    }
    </style>
</head>
<body>
<!-- HTML Form -->
<form id="form1" name="form1" method="post" action="">
        <table width="800" border="1" align="center">
            <tr>
            <td colspan="2" align="center" class="colspan-center"><strong>Thành Phần Món Ăn</strong></td>
            </tr>
            <tr>
                <td width="148">Món Ăn</td>
                <td width="636">
                    <?php $controller->loadComboBoxMonAn(); ?>
                </td>
            </tr>
            <tr>
                <td>Nguyên Liệu</td>
                <td>
                    <?php $controller->loadComboBoxNguyenLieu(); ?>
                </td>
            </tr>
            <tr>
                <td>Số lượng (Kg)</td>
                <td>
                    <label for="textfield3"></label>
                    <input type="text" name="textfield3" id="textfield3" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input style="background-color: #FEAF39;" type="submit" name="add_tp" id="add_tp" value="Xác Nhận" />
                </td>
            </tr>
        </table>
        <a class="button" style="background-color: #FEAF39;" href="index.php?controller=nguyen-lieu&action=danh-sach-can-mua">Nguyên Liệu Cần Mua</a>
</form>
</body>
</html>
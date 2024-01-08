<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        .container {
           
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border: 2px solid #FEAF39;
            border-radius: 8px;
            padding: 30px;
            margin-top: 15px;   
            background-color: #ffffff;
        }

        hr {
            border: 1px solid #FEC97A;
            text-align: center;
            width: 80%;
            margin: 20px auto;
        }

        .h2 {
            color: #FEAF39;
            font-family: 'Dancing Script';
            text-align: center;
            font-size: 40px;
            padding: 5px;
        }

        h3,
        .h3 {
            font-weight: 100;
            font-family: 'Roboto Mono';
            text-align: center;
            padding: 10px;
            font-size: 15px;
        }

        .date-input-container {
            text-align: center;
        }

        .input-date {
            max-width: 250px;
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            display: inline-block;
            border-radius: 5px;
        }

        .container label.h3 {
            display: block;
            margin-bottom: 5px;
        }

        .button {
            margin-top: 20px;
            text-align: center;
        }

        h4 {
            color: #FEAF39;
            font-family: 'Roboto';
            text-align: center;
            font-size: 25px;
            padding: 5px;
        }

        label {
            font-weight: bold;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            text-align: center;
        }

        .notes {
            margin-top: 25px;
            color: #FEAF39;
            font-weight: bold;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        td.image {
            border-radius: 20px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .button button,
        .delete button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .delete button {
            background-color: #f44336;
        }

        a {
            text-decoration: none;
            color: rgba(255, 80, 0, 0.8);
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: rgba(255, 80, 0, 0.5);
        }
        .status-icon {
            margin-right: 5px;
            font-size: 16px;
        }

        .text-success {
            color: #28a745; 
        }

        .text-danger {
            color: #dc3545; 
        }
        .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #555;
            font-size: 20px;
        }
        .bold-text {
         font-weight: bold;
            }
    </style>

<body>  
   
    <?php
    echo '<div>';
    echo '<a href="?controller=nhan_vien&action=vieworder">BACK</a>';
    echo "</div>";
    echo '<div class="h2">';
    echo "THÔNG TIN CHI TIẾT ĐƠN HÀNG";
    echo "</div>";
 
    echo '<div class="container">';
        echo '<form action="?controller=datmon&action=store" method="post">';
        echo '<h3>HỌ VÀ TÊN NGƯỜI ĐẶT: <i>'
        .$arr[0]['HoTen']
        .'</i></h3>'; 
        echo '<hr>';
        echo '<h3>MÃ NHÂN VIÊN: <i>'
        .$arr[0]['MaNhanVien']
        .'</i></h3>';
        echo '<hr>';
    echo '</div>';
    echo '<h4>DANH SÁCH CÁC MÓN ĂN ĐÃ ĐẶT</h4>';
    echo '<table>
        <tr>
            <th>TÊN MÓN ĂN</th>
            <th>GIÁ MÓN ĂN</th>
            <th>HÌNH ẢNH</th>
            <th>SỐ LƯỢNG</th>
            <th>THÀNH TIỀN</th>
        </tr>';
    $i = 1;
    $tong = 0;
    foreach ($arr as $each) {
        $thanhTien = $each['SoLuong'] * $each['GiaMonAn'];
        echo '<tr>
            <td>' . $each['TenMonAn'] . '</td>
            <td>' . $each['GiaMonAn'] . '</td>
            <td class="image">' . $each['HinhAnh'] . '</td>
            <td>' . $each['SoLuong'] . '</td>
            <td>' . $thanhTien . '</td>
        </tr>';
        
        // Cập nhật tổng tiền
        $tong += $thanhTien;
    }
    echo '<tr>
            <td class="bold-text" colspan="4">Tổng tiền:</td>
            <td>' . $tong . '</td>
        </tr>';
    echo '<tr>
        <td class="bold-text" colspan="4">Thời gian đặt món:</td>
        <td>' . $arr[0]['ThoiGianDatMon'] . '</td>
    </tr>';

    echo '<tr>
        <td class="bold-text" colspan="4">Thời gian nhận món:</td>
        <td>' . $arr[0]['ThoiGianNhanMon'] . '</td>
    </tr>';

    echo '<tr>
    <td class="bold-text" colspan="4">Ghi Chú:</td>
    <td>' . (!empty($arr[0]['GhiChu']) ? $arr[0]['GhiChu'] : 'Không có ghi chú') . '</td>
    </tr>';

    echo '<tr>
    <td class="bold-text" colspan="4">Trạnh thái đơn hàng:</td>
    <td>';
        echo $arr[0]['TrangThaiDonHang'] == 1
            ? '<i class="fas fa-check-circle text-success"></i> Đã thanh toán'
            : '<i class="fas fa-times-circle text-danger"></i> Chưa thanh toán';
        echo '</td>
        </tr>';

        echo '<tr>
            <td class="bold-text" colspan="4">Trạng thái nhận món:</td>
            <td>';
        if (isset($arr[0]['TrangThaiGiaoMon'])) {
            echo $arr[0]['TrangThaiGiaoMon'] == 1
                ? '<i class="fas fa-check-circle text-success"></i> Đã giao món'
                : '<i class="fas fa-times-circle text-danger"></i> Chưa giao món';
        } else {
            echo '<i class="fas fa-question-circle text-danger"></i> Trạng thái giao món không xác định';
        }
        echo '</td>
        </tr>';
        echo '</table>';


    ?>

</body>

</html>

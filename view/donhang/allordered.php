<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Danh sách đơn hàng - Kitchen Pro ++</title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #FEA116;
            font-family: 'Dancing Script', 'cursive';
            padding: 20px;
            text-align: center;
            color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .body {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .main {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .main div {
            flex: 1;
            min-width: calc(33.33% - 20px);
            box-sizing: border-box;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            position: relative;
        }

        .main div:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .main div div {
            margin-bottom: 10px;
        }

        .main div div:first-child {
            font-size: 18px;
            font-weight: bold;
            color: #FEA116;
        }

        .main div div:nth-child(2),
        .main div div:nth-child(3),
        .main div div:nth-child(4),
        .main div div:nth-child(5),
        .main div div:nth-child(6),
        .main div div:last-child {
            color: #555;
        }

        .status-icon {
            margin-right: 5px;
            font-size: 16px;
        }

        .backtohome {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px;
            text-decoration: none;
            background-color: #FEA116;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .backtohome:hover {
            background-color: #0056b3;
        }

        .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #555;
            font-size: 20px;
        }
        a
        {
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>TẤT CẢ ĐƠN HÀNG CỦA BẠN</h1>
        </div>
        <div style="display: flex; justify-content: space-around; margin-bottom: -35px;">
            <a class="backtohome" href="?controller=datmon&role=3" style="height: fit-content;">Quay về trang chủ</a>
            <div style="text-align: center;">
                <h4>
                    <?php
                        echo "Bạn cần thanh toán tất cả các đơn hàng trong tháng trước ";
                        echo date("t-m-Y", strtotime(date("Y-m-d")));
                    ?>
                </h4>
                <h3 style="display: inline;">Tổng tiền cần thanh toán: </h3>
                <h2 style="color: #f5574c">
                    <?php 
                    echo $sumOfAmountOfInvoice['TongTien'] .' VNĐ';
                        // if($sumOfAmountOfInvoice != ''){
                        //     echo '0' .' VNĐ';
                        // }
                        // else {
                        //     echo $sumOfAmountOfInvoice['TongTien'] .' VNĐ';
                        // }
                    ?>
                </h2>
            </div>
            <a class="backtohome" href="?controller=nhan_vien&action=tien_mat&role=3&tong_tien=<?php 
                        echo $sumOfAmountOfInvoice['TongTien'];
                    ?>" style="height: fit-content;">
                Thanh Toán
            </a>
        </div>
        <div class="body">
            <div class="main">
                <?php foreach ($arr as $each) : ?>
                    <div>
                        <i class="icon fas fa-shopping-bag"></i>
                        <a href="?controller=datmon&action=viewdetail&maDonHang=<?php echo $each['MaDonHang']; ?>">
                            <div><?php echo 'Mã Đơn Hàng' . ': ' . $each['MaDonHang']; ?></div>
                        </a>
                        <div><?php echo 'Thời gian nhận hàng' . ': ' . $each['ThoiGianNhanMon']; ?></div>

                        <div>
                        <i class="status-icon fas <?php echo $each['TrangThaiDonHang'] == 0 ? 'fa-times-circle text-danger' : 'fa-check-circle text-success'; ?>" style="color: <?php echo $each['TrangThaiDonHang'] == 0 ? 'red' : 'green'; ?>"></i>
                        <?php echo $each['TrangThaiDonHang'] == 0 ? '<span style="color: red;">Chưa thanh toán</span>' : '<span style="color: green;">Đã thanh toán</span>'; ?>
                    </div>

                    <?php if (isset($each['TrangThaiGiaoMon'])) : ?>
                        <div>
                            <i class="status-icon fas <?php echo $each['TrangThaiGiaoMon'] == 0 ? 'fa-times-circle text-danger' : 'fa-check-circle text-success'; ?>" style="color: <?php echo $each['TrangThaiGiaoMon'] == 0 ? 'red' : 'green'; ?>"></i>
                            <?php echo $each['TrangThaiGiaoMon'] == 0 ? '<span style="color: red;">Chưa giao món</span>' : '<span style="color: green;">Đã giao món</span>'; ?>
                        </div>
                    <?php else : ?>
                        <div>
                            <i class="status-icon fas fa-question-circle text-danger" style="color: red;"></i>
                            <span style="color: red;">Trạng thái giao món không xác định</span>
                        </div>
                    <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>

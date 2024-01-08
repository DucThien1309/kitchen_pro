<!-- <?php
        echo '<pre>';
        print_r($data)
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/assets/img/favicon.ico" type="image/x-icon" rel="icon" />
    <title>Danh sách cần mua</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .danhsach {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: blueviolet;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button-container {
            text-align: right;
            padding: 10px;
        }
        .button:hover {
            background-color: #00CC00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        thead {
            background-color: #333;
            color: #fff;
        }

        tfoot {
            background-color: #333;
            color: #fff;
        }
        
    </style>
</head>
<!-- <body>
    <div class="danhsach">
        <h2 style="text-align: center; color: blueviolet;">Danh Sách Nguyên Liệu Cần Mua</h2>
        <table width="100%" border="1">
            <thead style="background-color: #333;color: #fff;">
                <tr style="height: 50px;">
                    <td align="center"><strong>STT</strong></td>
                    <td align="center"><strong>Tên Món Ăn</strong></td>
                    <td align="center"><strong>Tên Nguyên Liệu</strong></td>
                    <td align="center"><strong>Số Lượng</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($data as $value) {
                ?>
                    <tr style="height: 40px;">
                        <td align="center"><?php echo $stt; ?></td>
                        <td align="center"><?php echo $value['TenMonAn']; ?></td>
                        <td align="center"><?php echo $value['TenNguyenLieu']; ?></td>
                        <td align="center"><?php echo $value['SoLuong']; ?></td>
                    </tr>
                <?php
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body> -->
<?php
// Mảng để lưu tổng số lượng cho mỗi nguyên liệu
$totalQuantitiesSummary = array();

// Tính tổng số lượng cho mỗi nguyên liệu
foreach ($data as $value) {
    $tenNguyenLieu = $value['TenNguyenLieu'];
    $soLuong = $value['SoLuong'];
    $soLuongNLCM = $value['NLCM'];

    if (isset($totalQuantitiesSummary[$tenNguyenLieu])) {
        $totalQuantitiesSummary[$tenNguyenLieu] += $soLuongNLCM;
    } else {
        $totalQuantitiesSummary[$tenNguyenLieu] = $soLuongNLCM;
    }
}
?>

<body>
    <div class="danhsach">
        <h2 style="text-align: center; color: #FEAF39;">Danh Sách Nguyên Liệu Cần Mua</h2>
        <a class="button" style="background-color: #FEAF39;" href="index.php?controller=nguyen-lieu&action=thanh-phan-mon-an">Thành Phần Món Ăn</a>
        <a class="button" style="background-color: #FEAF39;" href="?index.php">Về Trang Chủ</a>
        <table width="100%" border="1">
            <thead style="background-color: #333;color: #fff;">
                <tr style="height: 50px;">
                    <td align="center"><strong>STT </strong></td>
                    <td align="center"><strong>Số lượng đặt</strong></td>
                    <td align="center"><strong>Tên Món Ăn</strong></td>
                    <td align="center"><strong>Thành Phần Món Ăn</strong></td>
                    <td align="center"><strong>Số Lượng (KG)</strong></td>
                    <td align="center"><strong>Số Lượng Nguyên Liệu Cần Mua (KG)</strong></td>
                    <td align="center"><strong>Đơn Giá</strong></td>
                    <td align="center"><strong>Thành Tiền (VNĐ)</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                $currentFood = '';
                $totalThanhTien = 0;

                foreach ($data as $value) {
                    if ($value['TenMonAn'] != $currentFood) {
                        $currentFood = $value['TenMonAn'];
                        $rowspan = count(array_filter($data, function ($item) use ($currentFood) {
                            return $item['TenMonAn'] == $currentFood;
                        }));

                ?>
                        <tr style="height: 40px;">
                            <td align="center" rowspan="<?php echo $rowspan; ?>"><?php echo $stt; ?></td>
                            <td align="center" rowspan="<?php echo $rowspan; ?>"><?php echo $value['SoLuongDonHang']; ?></td>
                            <td align="center" rowspan="<?php echo $rowspan; ?>"><?php echo $value['TenMonAn']; ?></td>
                            <td align="center"><?php echo $value['TenNguyenLieu']; ?></td>
                            <td align="center"><?php echo $value['SoLuong']; ?></td>
                            <td align="center"><?php echo number_format(round($value['NLCM'], 2), 2, '.', ','); ?></td>
                            <td align="center"><?php echo number_format($value['GiaNguyenLieu'], 0, '.', ','); ?> VNĐ</td>
                            <td align="center"><?php echo number_format($value['TT'], 0, '.', ','); ?> VNĐ</td>
                        </tr>
                    <?php
                        $stt++;
                    } else {
                    ?>
                        <tr style="height: 40px;">
                            <td align="center"><?php echo $value['TenNguyenLieu']; ?></td>
                            <td align="center"><?php echo $value['SoLuong']; ?></td>
                            <td align="center"><?php echo number_format(round($value['NLCM'], 2), 2, '.', ','); ?></td>
                            <td align="center"><?php echo number_format($value['GiaNguyenLieu'], 0, '.', ','); ?> VNĐ</td>
                            <td align="center"><?php echo number_format($value['TT'], 0, '.', ','); ?> VNĐ</td>
                        </tr>
                <?php
                    }

                    // Add to overall total for each row
                    $totalThanhTien += $value['TT'];
                }
                ?>
                <tr style="height: 30px;">
                    <td colspan="7" align="center"><strong>Tổng Thành Tiền</strong></td>
                    <td align="center"><?php echo number_format($totalThanhTien, 0, '.', ','); ?> VNĐ</td>
                </tr>
            </tbody>
            <!-- Bảng thống kê tổng hợp số lượng nguyên liệu -->
            <tfoot id="xem">
                <tr style="height: 40px;background-color: #333;color: #fff;">
                    <td colspan="100%" align="center"><strong>Tổng Hợp Số Lượng Nguyên Liệu</strong></td>
                </tr>
                <tr style="background-color: #333;color: #fff;">
                    <td colspan="5" align="center"><strong>Tên Nguyên Liệu Cần Mua</strong></td>
                    <td colspan="3" align="center"><strong>Số Lượng (KG)</strong></td>
                </tr>
                <?php
                foreach ($totalQuantitiesSummary as $tenNguyenLieu => $tongSoLuong) {
                ?>
                    <tr style="height: 40px;">
                        <td align="center" colspan="5"><?php echo $tenNguyenLieu; ?></td>
                        <td align="center" colspan="3"><?php $tongSoLuongFormatted = rtrim(rtrim(number_format($tongSoLuong, 2), '0'), '.');
                                                        echo $tongSoLuongFormatted; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tfoot>
        </table>
    </div>
</body>

</html>